<div class="sidebar sidebar-sticky bg-light collapse" id="sidebar">

  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">Производитель</h6>

  <form method="get" id="filters">
    <ul class="nav flex-column">
      <?foreach(myFilters::get('Manufacturers') as $k => $v):?>
        <li class="nav-item pl-1">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck<?=$k?>" name="m[<?=$k?>]" <?=myURL::in($k,'m')?'checked':''?>>
            <label class="custom-control-label d-flex justify-content-between align-items-center" for="customCheck<?=$k?>">
              <?=$v['manufacturers_name']?><span class="badge badge-pill badge-secondary mr-md-0 mr-3 small"><?=$v['manufacturers_count']?></span>
            </label>
          </div>
        </li>
      <?endforeach?>
    </ul>

    <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">Цена</h6>

    <input hidden name="category" value="<?=myURL::get('category')?>">
    <input hidden name="price_from" value="<?=myURL::get('price_from')?>">
    <input hidden name="price_to" value="<?=myURL::get('price_to')?>">
    <input class="form-control form-control-sm text-center" type="text" readonly id="slider_price">
  </form>

  <ul class="nav flex-column mb-2">
    <li class="nav-item">
      <span class="nav-link">
        <div id="slider-range"></div>
      </span>
    </li>
  </ul>

</div>