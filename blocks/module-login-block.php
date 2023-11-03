<?php 
$className  = !empty($block['className']) ? $block['className'] : null;
$bg         = get_field('background') && is_page() ? get_field('background') : get_field('twm_background', 'option');
$heading    = get_field('heading-login');
$form = get_field('form');
?>

<style> 
.wrapper-login {
  display: flex;
  flex-direction: row-reverse;
  flex-wrap: wrap;
  padding-top: 10rem;
}

.text-wrapper,
.form-wrapper {
  width: 50%;
}

.module-title-login {
  color: white;
  text-align: center;
  font-size: 48px;
}

.login-form-wrapper{
  margin: 0 2rem;
  padding: 2rem;
  background-color: white;
  border-radius: 20px;
  text-align: center;
}

.login-btn{
  width: 100%;
    border-radius: 50px;
    padding: 15px 0;
    letter-spacing: 1.4px;
    font-weight: 900;
    font-size: 18px;
    text-transform: uppercase;
}

@media only screen and (max-width: 768px) {
  .text-wrapper,
  .form-wrapper {
    width: 100%;
  }

  .wrapper-login {
    flex-direction: column;
    padding-top: 1rem;
  }

  .login-form-wrapper{
    /* margin-top: 2rem; */
    margin: 2rem 0;

  }

  .module-title-login {
    margin-top: 2rem;
    font-size: 36px;
  }
}

</style>
<section class="module module-login-block bg-login <?= $className ?>">
  <div class="wrapper-login wrapper">
    <div class="text-wrapper">
        <!-- Text on the right -->
        <h2 class="module-title-login module-title text-white"><?= $heading ?></h2>
    </div>
    <div class="form-wrapper">
        <!-- Place your shortcode for login form here -->
        <div class="login-form-wrapper">
          <?= do_shortcode($form); ?>
        </div>
    </div>
  </div>
</section>
