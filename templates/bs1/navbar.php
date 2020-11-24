<nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-xl-nowrap p-0">
  <div class="navbar-expand-sm">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Menu" aria-controls="Menu" aria-expanded="false" aria-label="Toggle navigation">
      <!--span class="navbar-toggler-icon"></span-->
      Главное меню
    </button>
    <div class="collapse navbar-collapse" id="Menu">
      <ul class="navbar-nav mr-5 text-nowrap">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Рюкзаки
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <a class="dropdown-item d-flex" id="category4" href="?category=4">
              <span class="mr-5">Акция рюкзаки</span>
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=myFilters::get('Categories')['4']['products_count']?></span>
              </span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex" id="category10" href="?category=10">
              <span class="mr-5">Рюкзаки дошкольные</span>
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=myFilters::get('Categories')['10']['products_count']?></span>
              </span>
            </a>
            <a class="dropdown-item d-flex" id="category5" href="?category=5">
              <span class="mr-5">Рюкзаки каркасные</span>
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=myFilters::get('Categories')['5']['products_count']?></span>
              </span>
            </a>
            <a class="dropdown-item d-flex" id="category11" href="?category=11">
              <span class="mr-5">Ранец-рюкзак</span>
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=myFilters::get('Categories')['11']['products_count']?></span>
              </span>
            </a>
            <a class="dropdown-item d-flex" id="category12" href="?category=12">
              <span class="mr-5">Рюкзаки подростковые</span>
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=myFilters::get('Categories')['12']['products_count']?></span>
              </span>
            </a>
            <a class="dropdown-item d-flex" id="category13" href="?category=13">
              <span class="mr-5">Рюкзаки туристические</span> 
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=isset(myFilters::get('Categories')['13']['products_count']) ? myFilters::get('Categories')['13']['products_count'] : 0?></span>
              </span>
            </a>
            <a class="dropdown-item d-flex" id="category14" href="?category=14">
              <span class="mr-5">Портфели</span>
              <span class="ml-auto">
                <span class="badge badge-pill badge-secondary"><?=myFilters::get('Categories')['14']['products_count']?></span>
              </span>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Сумки
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" href="#">Акция пеналы</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Пеналы мягкие</a>
            <a class="dropdown-item" href="#">Пеналы без наполнения</a>
            <a class="dropdown-item" href="#">Пеналы с наполнением</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Пеналы
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <a class="dropdown-item" href="#">Акция пеналы</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Пеналы мягкие</a>
            <a class="dropdown-item" href="#">Пеналы без наполнения</a>
            <a class="dropdown-item" href="#">Пеналы с наполнением</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Прочее
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
            <a class="dropdown-item" href="#">Акция пеналы</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Пеналы мягкие</a>
            <a class="dropdown-item" href="#">Пеналы без наполнения</a>
            <a class="dropdown-item" href="#">Пеналы с наполнением</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Канцтовары
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
            <a class="dropdown-item" href="#">Акция пеналы</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Пеналы мягкие</a>
            <a class="dropdown-item" href="#">Пеналы без наполнения</a>
            <a class="dropdown-item" href="#">Пеналы с наполнением</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Бумага
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown6">
            <a class="dropdown-item" href="#">Альбомы/акварельная бумага/ватман</a>
            <a class="dropdown-item" href="#">Блокноты</a>
            <a class="dropdown-item" href="#">Бумага для заметок</a>
            <a class="dropdown-item" href="#">Бумага специальная</a>
            <a class="dropdown-item" href="#">Грамоты</a>
            <a class="dropdown-item" href="#">Изделия из бумаги/картона</a>
            <a class="dropdown-item" href="#">Раскраски</a>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <form method="get" class="form-inline w-100" action="search.php" id="mysearch">
    <input class="form-control form-control-dark w-100" type="text" placeholder="Найти..." aria-label="Search" name="myq">
  </form>
  <div class="navbar-expand">
    <ul class="navbar-nav px-0">
      <li class="nav-item d-block d-md-none">
        <a class="nav-link" data-toggle="collapse" href="#sidebar" role="button" aria-expanded="false" aria-controls="sidebar">
          Фильтры
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Настройки</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-nowrap" href="#">Корзина <span class="badge badge-light">0</span></a>
      </li>
    </ul>
  </div>
</nav>


<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <div class="jumbotron">
      <h1 class="display-4"><em>Jumbotron Component</em></h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p class="lead">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
          Launch demo Modal Component
        </button>
      </p>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal Component title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user notifications, or completely custom content.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>