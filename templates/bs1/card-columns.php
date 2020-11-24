<div class="text-center">
  <span><?=myFilters::get('Categories')[myURL::get('category')]['category_name']?> | Показано <?=myPagination::$fromItem+1?> - <?=myPagination::$CountItems-myPagination::$fromItem>myConf::get('onPage')?myPagination::$fromItem+myConf::get('onPage'):myPagination::$CountItems?> из <?=myPagination::$CountItems?> товаров</span>
</div>

<div class="card-columns">
  <?while($Product = $Products->fetch_assoc()):?>
    <div class="card bg-light text-center">
      <h5 class="card-header"><?=$Product['pname']?></h5>
      <img class="card-img-top p-1" src="<?=myConf::get('ImagePath').$Product['iname']?>" alt="<?=$Product['iname']?>">
      <div class="card-body">
        <span class="card-text h1"><?=floor($Product['pprice'])?></span><span class="card-text h3">,<?=substr($Product['pprice'],strpos($Product['pprice'],'.')+1)?></span><span class="card-text h4"> грн</span>
      </div>
      <div class="card-footer">
        <a href="" class="btn btn-dark">Добавить в корзину</a>
      </div>
    </div>
  <?endwhile?>
</div>

<?require 'pagination.php'?>