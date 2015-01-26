<?php
  use yii\helpers\Html;
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar;
  use yii\widgets\Breadcrumbs;
  use app\assets\AppAsset;

  /* @var $this \yii\web\View */
  /* @var $content string */

  AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>
  <body>
    <?php $this->beginBody() ?>
    <?php $this->endBody() ?>
    <div class="wrap">
      <?php
        NavBar::begin([
          'brandLabel' => '',
          'brandUrl'   => Yii::$app->homeUrl,
          'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
          ],
        ]);

        $items = [
          ['label' => 'View Loads', 'url' => ['/site/index']],
        ];

        if (!Yii::$app->user->isGuest) {
          $items[] = ['label' => 'View All Loads', 'url' => ['/site/index', 'showCompleted' => 1]];
          $items[] = ['label' => 'Customizations', 'url' => ['/site/config']];
        }

        $items[] = ['label' => 'New Load', 'url' => ['/load/create']];
        $items[] = Yii::$app->user->isGuest ? ['label' => 'Login', 'url' => ['/site/login']] : ['label' => 'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];

        echo Nav::widget([
          'options' => ['class' => 'navbar-nav navbar-right'],
          'items'   => $items,
        ]);
        NavBar::end();
      ?>

      <div class="container<?= $this->context->module->controller->action->id == "index" ? "-fluid" : "" ?>">
        <?= Breadcrumbs::widget([
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
      </div>
    </div>

    <!--footer class="footer">
      <div class="container">
        <p class="pull-left">&copy; AVG Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
      </div>
    </footer-->


  </body>
</html>
<?php $this->endPage() ?>
