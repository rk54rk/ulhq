<?php 
  global $current_user;
  get_currentuserinfo();
  $domain = get_bloginfo('url');
?>

<ul id="menu-user-menu" class="nav navbar-nav navbar-right">

<?php if(!is_user_logged_in()):?>

<?php else:?>

  
  <li id="menu-item-user" class="menu-item menu-item-has-children dropdown">
  
      <a title="<?php echo $current_user->display_name; ?>" href="#" data-toggle="dropdown" class="dropdown-toggle" style="padding:3px 6px;margin-top:1px;margin-left:30px;"><span><?php bp_loggedin_user_avatar( 'width=' . 20 . '&height=' . 20 ); ?> <?php echo $current_user->display_name; ?>&nbsp;<span class="badge"><?php if($noti_counts['total']!=0){echo $noti_counts['total'];} ?></span></span></a>
  
    <ul role="menu" class=" dropdown-menu">

      <li id="menu-item-profile" class="menu-item"><a title="Profile" href="<? echo bp_loggedin_user_domain(); ?>settings/">Settings</a></li>
      
      <li id="menu-item-logout" class="menu-item"><a title="Log Out" href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
    </ul>
  </li>
  <?php endif;?>
</ul>