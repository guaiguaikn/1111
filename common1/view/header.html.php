<?php
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include 'header.lite.html.php';
include 'chosen.html.php';
//include 'validation.html.php';
?>
<?php
/* Load hook files for current page. */
$extPath      = $this->app->getModuleRoot() . '/common/ext/view/';
$extHookRule  = $extPath . 'header.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;
?>
<?php if(empty($_GET['onlybody']) or $_GET['onlybody'] != 'yes'):?>
<?php $this->app->loadConfig('sso');?>
<?php if(!empty($config->sso->redirect)) js::set('ssoRedirect', $config->sso->redirect);?>
<style type="text/css">#pageNav .btn-group{width: 180px;}</style>
<header id='header'>
  <div id='mainHeader' style="background: url('<?php echo $config->webRoot.'theme/default/images/banner.png'?>');">
    <div class='container'>
      <?php if(reset($_SESSION['user']->groups)):?>
        <hgroup id='heading' style="width: 100%;top:10px;">
          <!-- <div style="float: left;"><img style="width: 120px;margin-left:20px;" src="<?php echo $config->webRoot.'theme/default/images/logo.png'?>"></div> -->
          <?php $heading = $app->company->name;?>
          <h1 style="font-size: 18px;" id='companyname' title='<?php echo $heading;?>'<?php if(strlen($heading) > 36) echo " class='long-name'" ?>><?php echo html::a(helper::createLink('index'), $heading);?></h1>

          <!-- <h1 style="width: 100%;text-align: center;max-width: none;" id='companyname' title='<?php echo $heading;?>'<?php if(strlen($heading) > 36) echo " class='long-name'" ?>><?php echo $heading;?></h1> -->
        </hgroup>
      <?php else:?>
        <hgroup id='heading' style="top:10px;">
       <!--  <div style="float: left;"><img style="width: 120px;" src="<?php echo $config->webRoot.'theme/default/images/logo.png'?>"></div> -->
          <?php $heading = $app->company->name;?>
          <h1 style="font-size: 18px;" id='companyname' title='<?php echo $heading;?>'<?php if(strlen($heading) > 36) echo " class='long-name'" ?>><?php echo html::a(helper::createLink('index'), $heading);?></h1>
        </hgroup>
      <?php endif;?>
      <nav id='navbar'><?php commonModel::printMainmenu($this->moduleName);?></nav>
      <div id='toolbar'>
        <div id="userMenu">
          <?php if(!reset($_SESSION['user']->groups)):?>
            <?php common::printSearchBox();?>
          <?php endif;?>
          <ul id="userNav" class="nav nav-default">
            <li><?php common::printUserBar();?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php if(reset($_SESSION['user']->groups)):?>
  <?php $a = explode('-',$_SERVER['REQUEST_URI']);if(in_array($a[1],array('task','questions','daily','operation','standard','task.html','questions.html','daily.html','operation.html','standard.html','elestandard','elestandard.html','listtype','listtype.html','pkstandard','pkstandard.html','risk','risk.html','quality','quality.html','gantt','gantt.html','information','information.html','summary','summary.html','grade','grade.html','orglist','orglist.html','situation','situation.html','terminal','terminal.html','application','application.html'))):?>
  <div id='subHeader' style="background: none;z-index: 1000;min-height:0;">
    <div class='container'>
    <div id="pageNav" class='btn-toolbar' style="z-index: 1000;">   
      <?php include 'change.html.php';?>
    </div>
      <!-- <div id="pageNav" class='btn-toolbar' style="z-index: 1000;"><?php if(isset($lang->modulePageNav)) echo $lang->modulePageNav;?></div> -->
      <!-- <nav id='subNavbar'><?php common::printModuleMenu($this->moduleName);?></nav> -->
      <div id="pageActions"><div class='btn-toolbar'><?php if(isset($lang->modulePageActions)) echo $lang->modulePageActions;?></div></div>
    </div>
  </div>
  <?php endif;?>
  <?php else:?>
  <div id='subHeader'>
    <div class='container'>
      <div id="pageNav" class='btn-toolbar'><?php include 'change.html.php';?></div>
      <!-- <div id="pageNav" class='btn-toolbar'><?php if(isset($lang->modulePageNav)) echo $lang->modulePageNav;?></div> -->
      <nav id='subNavbar'><?php common::printModuleMenu($this->moduleName);?></nav>
      <div id="pageActions"><div class='btn-toolbar'><?php if(isset($lang->modulePageActions)) echo $lang->modulePageActions;?></div></div>
    </div>
  </div>
  <?php endif;?>
  <?php
  if(!empty($config->sso->redirect))
  {
      css::import($defaultTheme . 'bindranzhi.css');
      js::import($jsRoot . 'bindranzhi.js');
  }
  ?>
</header>

<?php endif;?>
<main id='main' <?php if(!empty($config->sso->redirect)) echo "class='ranzhiFixedTfootAction'";?> >
  <div class='container'>
