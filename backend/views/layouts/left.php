<?php 
use backend\models\User;
?>
<aside class="main-sidebar">

    <section class="sidebar">
        <?php 
            $dataUserLogin = User::find()
                ->joinWith(['mURID', 'gURU', 'tENAGAUMUM'])
                ->orWhere(['murid.NIS' => Yii::$app->user->identity->username])
                ->orWhere(['guru.NIP' => Yii::$app->user->identity->username])
                ->orWhere(['tenaga_umum.NIP' => Yii::$app->user->identity->username])
                ->one();
        ?>
        <?php 
            if (isset($dataUserLogin->mURID)) {
                $dataFotoUser = $dataUserLogin->mURID->FOTO; 
            }elseif (isset($dataUserLogin->gURU)) {
                $dataFotoUser = $dataUserLogin->gURU->FOTO; 
            }elseif (isset($dataUserLogin->tENAGAUMUM)) {
                $dataFotoUser = $dataUserLogin->tENAGAUMUM->FOTO; 
            }else{
                $dataFotoUser = 0; 
            }
        ?>
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/uploads/foto/'.$dataFotoUser ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                
                <?php 
                    if (isset($dataUserLogin->mURID)) {
                        echo $dataUserLogin->mURID->NAMA;
                    }elseif (isset($dataUserLogin->gURU)) {
                        echo $dataUserLogin->gURU->NAMA;
                    }elseif (isset($dataUserLogin->tENAGAUMUM)) {
                        echo $dataUserLogin->tENAGAUMUM->NAMA;
                    }else{
                        echo Yii::$app->user->identity->username;
                    }
                ?>
                <br>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    //Menu
                    [
                        'label' => 'Murid',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Data Murid', 'icon' => 'file-code-o', 'url' => ['/murid'],],
                            ['label' => 'Keluarga Murid', 'icon' => 'dashboard', 'url' => ['/keluarga-murid'], 'visible' => Yii::$app->user->can('guru') || Yii::$app->user->can('admin') || Yii::$app->user->can('tenagaUmum'),],
                            ['label' => 'Jenis Keluarga', 'icon' => 'dashboard', 'url' => ['/jenis-keluarga'], 'visible' => Yii::$app->user->can('admin') || Yii::$app->user->can('tenagaUmum')],
                            ['label' => 'Kelas', 'icon' => 'dashboard', 'url' => ['/kelas'], 'visible' => Yii::$app->user->can('guru') || Yii::$app->user->can('admin') || Yii::$app->user->can('tenagaUmum')],
                            ['label' => 'Kelas Murid', 'icon' => 'dashboard', 'url' => ['/kelas-murid'],],
                            ['label' => 'Nilai Murid', 'icon' => 'dashboard', 'url' => ['/nilai-akademik'],],
                            ['label' => 'Rapot Murid', 'icon' => 'dashboard', 'url' => ['/kelas-murid/lihat-rapot'],],
                        ],
                    ],
                    [
                        'label' => 'Peraturan Murid',
                        'icon' => 'book',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('guru') || Yii::$app->user->can('admin') || Yii::$app->user->can('murid'),
                        'items' => [
                            ['label' => 'Peraturan & Sanksi', 'icon' => 'file-code-o', 'url' => ['/peraturan'],],
                            ['label' => 'Pelanggaran Murid', 'icon' => 'file-code-o', 'url' => ['/pelanggaran-murid'],],
                        ],
                    ],

                    [
                        'label' => 'Keperluan Tambahan',
                        'icon' => 'users',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Agama', 'icon' => 'file-code-o', 'url' => ['/agama'],],
                            ['label' => 'Semester', 'icon' => 'file-code-o', 'url' => ['/semester'],],
                            ['label' => 'Tahun Ajaran', 'icon' => 'file-code-o', 'url' => ['/tahun-ajaran'],],
                        ],
                    ],

                    [
                        'label' => 'Manajemen User',
                        'icon' => 'users',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'User', 'icon' => 'file-code-o', 'url' => ['/user'],],
                            ['label' => 'Hak Akses User', 'icon' => 'file-code-o', 'url' => ['/admin'],],
                            ['label' => 'Permission', 'icon' => 'file-code-o', 'url' => ['/admin/permission'],],
                            ['label' => 'Route', 'icon' => 'file-code-o', 'url' => ['/admin/route'],],
                        ],
                    ],

                    [
                        'label' => 'Manajemen Pelajaran',
                        'icon' => 'book',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('guru') || Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Mata Pelajaran', 'icon' => 'file-code-o', 'url' => ['/mata-pelajaran'],],
                            ['label' => 'Detail Mata Pelajaran', 'icon' => 'file-code-o', 'url' => ['/detail-mata-pelajaran'],],
                        ],
                    ],

                    [
                        'label' => 'Kepegawaian',
                        'icon' => 'book',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('guru') || Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Guru', 'icon' => 'file-code-o', 'url' => ['/guru'], 'visible' => Yii::$app->user->can('guru') || Yii::$app->user->can('admin'), ],

                            ['label' => 'Tenaga Umum', 'icon' => 'file-code-o', 'url' => ['/tenaga-umum'], 'visible' => Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('admin'),],
                        ],
                    ],

                    [
                        'label' => 'Keuangan',
                        'icon' => 'book',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Pembayaran SPP', 'icon' => 'file-code-o', 'url' => ['/pembayaran-spp']],
                        ],
                    ],
                    //EndMenu
                    /*['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                ],
            ]
        ) ?>

    </section>

</aside>
