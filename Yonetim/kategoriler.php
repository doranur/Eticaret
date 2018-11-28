<?php
 include 'ayarlar/baglanti.php';
 include 'inc/header.php'; ?>

<!-- start: page -->
   <header class="page-header">
    <h2> Kategoriler</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.php">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Layouts</span></li>
            <li><span>Sidebar Size SM</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
   </header>
   <div class="row">


       <div class="col-md-12">
           <section class="panel">
             <header class="panel-heading">
                 <div class="panel-actions">
                     <a href="kategori_ekle.php">
                     <span class="fa fa-plus"></span>&nbsp;Yeni ekle
                     </a>

                 </div>

                 <h2 class="panel-title">Basic with Table Tools</h2>
             </header>
             <div class="panel-body">
                 <table class="table table-bordered table-striped mb-none" >
                     <thead>
                     <tr>
                         <th>Rendering engine</th>
                         <th>Browser</th>
                         <th>Platform(s)</th>
                         <th class="hidden-xs">Engine version</th>
                         <th class="hidden-xs">CSS grade</th>
                     </tr>
                     </thead>
                     <tbody>
                     <!-- veri tabanından kategori çekme-->
                     <?php
                     function kategori($k_id=0, $st =1){
                         Global $db;
                         $veri=$db->prepare("SELECT * FROM kategoriler WHERE kategori_ust='$k_id'");
                         $veri->execute(array());
                         $v=$veri->fetchAll(PDO:: FETCH_ASSOC);
                         $say=$veri->rowCount();
                         if($say){

                             foreach ( $v as $tumkategoriler) {
                                 ?>
                                 <tr>
                                     <td><?php echo str_repeat("<span class='fa fa-arrow-right'></span> ",$st).$tumkategoriler['kategori_title']; ?></td>
                                     <td><?php echo $tumkategoriler['kategori_desc']; ?></td>
                                     <td>Win 98+ / OSX.1+</td>
                                     <td class="center hidden-xs">1.7</td>
                                     <td class="center hidden-xs">A</td>
                                 </tr>
                                 <?php kategori($tumkategoriler['kategori_id'], $st+1); ?>
                                 <?php
                             }
                         }

                         } ?>
                     <?php kategori(); ?>
                     </tbody>
                 </table>
             </div>
         </section>
       </div>
   </div>
    <!-- end: page -->
<?php
 include 'inc/footer.php';
?>
