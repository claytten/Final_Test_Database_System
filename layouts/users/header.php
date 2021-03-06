<div class="az-header az-header-mail">
  <div class="container">
    <div class="az-header-left">
      <a href="../../" class="az-logo"><?php echo $_SESSION['name']?></a>
      <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      <a href="" id="azContentBodyHide" class="az-header-arrow d-md-none"><i class="icon ion-md-arrow-back"></i></a>
    </div><!-- az-header-left -->

    <div class="az-header-center">
      <form action="../../action/users/search/name_github.php" method="POST" accept-charset="utf-8">
        <input type="text" class="form-control" placeholder="Search for username github" name="name_github">
        <button type="submit" class="btn"><i class="fas fa-search"></i></button>
      </form>
    </div><!-- az-header-center -->
    
    <div class="az-header-right">
      <div class="dropdown az-profile-menu">
        <a href="" class="az-img-user"><img src="https://via.placeholder.com/500x500" alt=""></a>
        <div class="dropdown-menu">
          <div class="az-dropdown-header d-sm-none">
            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
          </div>
          <div class="az-header-profile">
            <div class="az-img-user">
              <img src="https://via.placeholder.com/500x500" alt="">
            </div><!-- az-img-user -->
            <h6><?php echo $_SESSION['name']?></h6>
            
          </div><!-- az-header-profile -->
          <a href="./profile.php" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
          <a href="../../action/logout.php" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
        </div><!-- dropdown-menu -->
      </div>
    </div><!-- az-header-right -->
  </div><!-- container -->
</div><!-- az-header -->