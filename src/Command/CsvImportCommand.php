<?php

declare(strict_types=1);

namespace App\Command;

use App\Helper\CSV;
use App\Helper\Menu;
use App\Helper\Persisted;
use App\ModelDBAL\Fetcher;
use App\ModelORM\Flusher;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Stopwatch\Stopwatch;
use App\ModelORM\Product;
use App\ModelORM\Category;
use App\ModelORM\ProductCategory;
use function Symfony\Component\String\u;
use Symfony\Component\String\Slugger\SluggerInterface;

class CsvImportCommand extends Command
{
    protected static $defaultName = 'csv:import';
    private $arg1Default = 'import/tovar2.csv';
    /**
     * @var Product\UseCase\Create\Handler
     */
    private $handler_product_create;
    /**
     * @var Category\UseCase\Create\Handler
     */
    private $handler_category_create;
    /**
     * @var ProductCategory\UseCase\Create\Handler
     */
    private $handler_product_category_create;
    /**
     * @var SluggerInterface
     */
    private $slugger;
    /**
     * @var Fetcher
     */
    private $fetcher;
    /**
     * @var Flusher
     */
    private $flusher;
    /**
     * @var Product\UseCase\Update\Handler
     */
    private $handler_product_update;
    /**
     * @var Category\UseCase\Update\Handler
     */
    private $handler_category_update;


    public function __construct(
        Product\UseCase\Create\Handler $handler_product_create,
        Category\UseCase\Create\Handler $handler_category_create,
        Product\UseCase\Update\Handler $handler_product_update,
        Category\UseCase\Update\Handler $handler_category_update,
        ProductCategory\UseCase\Create\Handler $handler_product_category_create,
        SluggerInterface $slugger,
        Fetcher $fetcher,
        Flusher $flusher
    )
    {
        parent::__construct();
        $this->handler_product_create = $handler_product_create;
        $this->handler_category_create = $handler_category_create;
        $this->handler_product_category_create = $handler_product_category_create;
        $this->slugger = $slugger;
        $this->fetcher = $fetcher;
        $this->flusher = $flusher;
        $this->handler_product_update = $handler_product_update;
        $this->handler_category_update = $handler_category_update;
    }

    protected function configure()
    {
        $this
            ->setDescription('Imports a CSV file')
            ->addArgument('path_to/csv_file', InputArgument::OPTIONAL, "CSV file [default: {$this->arg1Default} ]")
            ->addOption('delete-all', null, InputOption::VALUE_NONE, 'Deleting ALL from tables')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $stopwatch = new Stopwatch();
        $stopwatch->start('csv-import-command');

        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('path_to/csv_file');

        if ($arg1) {
            $io->note(sprintf('You passed a csv_file: %s', $arg1));
        } else {
            $arg1 = $this->arg1Default;
            $io->note(sprintf('Default csv_file is %s', $arg1));
        }

        if ($input->getOption('delete-all') and $io->ask('Delete the all tables? (yes/NO)', null) == 'yes') {
            $stopwatch->start('Delete all Product entities');
            $result = $this->fetcher->DeleteAllFromTable('product_product');
            $event = $stopwatch->stop('Delete all Product entities');
            $io->text(sprintf('Count of deleted Product entities: %d / Elapsed time: %.2f ms / Consumed memory: %.2f MB', $result, $event->getDuration(), $event->getMemory() / (1024 ** 2)));

            $stopwatch->start('Delete all Category entities');
            $result = $this->fetcher->DeleteAllFromTable('category_category');
            $event = $stopwatch->stop('Delete all Category entities');
            $io->text(sprintf('Count of deleted Category entities: %d / Elapsed time: %.2f ms / Consumed memory: %.2f MB', $result, $event->getDuration(), $event->getMemory() / (1024 ** 2)));

            $stopwatch->start('Delete all ProductCategory entities');
            $result = $this->fetcher->DeleteAllFromTable('product_category_product_category');
            $event = $stopwatch->stop('Delete all ProductCategory entities');
            $io->text(sprintf('Count of deleted ProductCategory entities: %d / Elapsed time: %.2f ms / Consumed memory: %.2f MB', $result, $event->getDuration(), $event->getMemory() / (1024 ** 2)));
        }

        $stopwatch->start('Import all data');

        $csv_array_from_file = CSV::getLinesFromFile($arg1);

        //$command_products = $command_categories = $command_products_categories = [];

        foreach ($csv_array_from_file as $i_ => $p_) {
            // Проверка на неправильное количество полей, перевод строк или символ ";" в описании продукта
            if (count($p_) != 55) continue;

            $csv_array_from_categories = CSV::getFieldsFromString($p_[3]);
            $wrong_category_flag = false;
            $replace_category = '';
            foreach ($csv_array_from_categories as $v) {
                $v = mb_strtolower($v);
                if (in_array($v, Menu::$menu_item_array)) {
                    $replace_category == '' ? $replace_category .= Menu::$menu_replacing_array[$v] : $replace_category .= ',' . Menu::$menu_replacing_array[$v];
                } else {
                    $wrong_category_flag = true;
                }
            }
            if ($wrong_category_flag) continue;
            $csv_array_from_categories = CSV::getFieldsFromString($replace_category); //print_r($csv_array_from_categories);


            $product_id = $this->fetcher->findProductIdByVendorCode($p_[0]);

            if (!$product_id) {
                $product_id = uuid::uuid4();
                $command_product = new Product\UseCase\Create\Command($product_id, (bool)$p_[1], $p_[2], (float)$p_[4], $p_[29], $p_[30], (int)$p_[0]);
                $this->handler_product_create->handle($command_product);
            } else {
                $command_product = new Product\UseCase\Update\Command($product_id, (bool)$p_[1], $p_[2], (float)$p_[4], $p_[29], $p_[30]);
                $this->handler_product_update->handle($command_product);
            }


            foreach ($csv_array_from_categories as $item) {
                $category_name = $item;
                $category_description = mb_strtoupper($item);
                $category_slug = (string)$this->slugger->slug(mb_strtolower($item));

                if (Persisted::has($category_slug)) {
                    $category_id = Persisted::search($category_slug);
                } else {
                    $category_id = $this->fetcher->findCategoryIdBySlug($category_slug);

                    if (!$category_id) {
                        $category_id = uuid::uuid4();
                        $command_category = new Category\UseCase\Create\Command($category_id, $category_name, $category_description, $category_slug);
                        $this->handler_category_create->handle($command_category);
                    }
                    Persisted::add($category_slug, (string)$category_id);
                }


                if (Persisted::has($product_id.$category_id)) continue;

                $found_product_category = $this->fetcher->findProductCategoryByProductIdAndCategoryId($product_id, $category_id);

                // Если ProductCategory\UseCase\Update\Command обновляет лишь id, то скрипач не нужен
                if (!$found_product_category) {
                    $product_category_id = uuid::uuid4();
                    $command_product_category = new ProductCategory\UseCase\Create\Command($product_category_id, $product_id, $category_id);
                    $this->handler_product_category_create->handle($command_product_category);
                    Persisted::add($product_id.$category_id);
                }
            }
        }

        $this->flusher->flush();


        $event = $stopwatch->stop('Import all data');
        $io->text(sprintf('Count of processed CSV lines: %d / Elapsed time: %.2f ms / Consumed memory: %.2f MB', count($csv_array_from_file), $event->getDuration(), $event->getMemory() / (1024 ** 2)));

        $event = $stopwatch->stop('csv-import-command');
        $io->newLine(1);
        $io->text(sprintf('Total CsvImportCommand elapsed time: %.2f ms / Consumed memory: %.2f MB', $event->getDuration(), $event->getMemory() / (1024 ** 2)));

        return Command::SUCCESS;
    }
}
