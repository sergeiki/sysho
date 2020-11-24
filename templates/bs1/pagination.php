<div>
  <ul class="pagination justify-content-center flex-wrap">
    <li class="page-item <?=myPagination::$Page==1?'disabled':''?>">
      <a class="page-link btn btn-dark" href="<?=myURL::build(array('page'=>myPagination::$Page-1))?>" aria-label="Пред">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?foreach(myPagination::$Pages as $k=>$v):?>
      <?if(myPagination::$Page==$v):?>
        <li class="page-item active">
          <span class="page-link btn btn-dark bg-dark border-dark"><?=$v?>
        </li>
      <?else:?>
        <li class="page-item <?=$v=='...'?'disabled':'font-bold';?>">
          <a class="page-link btn btn-dark" href="<?=myURL::build(array('page'=>$v))?>"><?=$v?></a>
        </li>
      <?endif;?>
    <?endforeach;?>
    <li class="page-item <?=myPagination::$Page==myPagination::$CountPages?'disabled':'';?>">
      <a class="page-link btn btn-dark" href="<?=myURL::build(array('page'=>myPagination::$Page+1))?>" aria-label="След">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</div>