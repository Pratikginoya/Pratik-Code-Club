@section('title', 'Dashboard')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $technologyCount }}</h3>
              <p>Technology</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a wire:navigate href="/technology" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $codeCount }}</h3>
              <p>Codes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a wire:navigate href="/code/search" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
  </section>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Learning</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card-success small-box">
            <div class="card-header" style="background-color: #D0347E;">
              <h3 class="card-title">Livewire</h3>
            </div>
            <div class="card-body" style="background-color: #ECAECB; padding: 17px;">
              <p class="mb-1"><b>Vesion</b>: 3.x _ (2023)</p>
              <p class="mb-1"><b>Lauched</b>: 2020</p>
              <p class="mb-1"><b>Designed by</b>: Caleb Porzio</p>
              <p class="mb-1">Framwork of Laravel</p>
            </div>
            <a href="https://livewire.laravel.com/docs/quickstart" target="blank" class="small-box-footer" style="background-color: #D0347E; opacity: 0.8;">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-success small-box">
            <div class="card-header" style="background-color: #21618c;">
              <h3 class="card-title">PHP</h3>
            </div>
            <div class="card-body" style="background-color: #a9cce3; padding: 17px;">
              <p class="mb-1"><b>Vesion</b>: 8.3 _ (23-Nov-2023)</p>
              <p class="mb-1"><b>Lauched</b>: 8 June 1995</p>
              <p class="mb-1"><b>Designed by</b>: Rasmus Lerdorf</p>
              <p class="mb-1">Scripting language</p>
            </div>
            <a href="https://www.php.net/docs.php" target="blank" class="small-box-footer" style="background-color: #21618c; opacity: 0.8;">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-success small-box">
            <div class="card-header" style="background-color: #D63A3A;">
              <h3 class="card-title">Laravel</h3>
            </div>
            <div class="card-body" style="background-color: #FCA9A3; padding: 17px;">
              <p class="mb-1"><b>Vesion</b>: 11.x (12-March-2024)</p>
              <p class="mb-1"><b>Lauched</b>: June 2011</p>
              <p class="mb-1"><b>Designed by</b>: Taylor Otwell</p>
              <p class="mb-1">Framwork of PHP</p>
            </div>
            <a href="https://laravel.com/docs/11.x" target="blank" class="small-box-footer" style="background-color: #D63A3A; opacity: 0.8;">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-success small-box">
            <div class="card-header" style="background-color: #4EA8BD;">
              <h3 class="card-title">React</h3>
            </div>
            <div class="card-body" style="background-color: #B8DCE5; padding: 17px;">
              <p class="mb-1"><b>Vesion</b>: 18.3 (25-April-2024)</p>
              <p class="mb-1"><b>Lauched</b>: 29-May-2013</p>
              <p class="mb-1"><b>Designed by</b>: Facebook</p>
              <p class="mb-1">Javascript Library (Front-end)</p>
            </div>
            <a href="https://react.dev/learn" target="blank" class="small-box-footer" style="background-color: #4EA8BD; opacity: 0.8;">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>