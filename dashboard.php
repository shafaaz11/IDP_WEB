<?php
include 'inc/header.php';

Session::CheckSession();
?>
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <h3><i class="fas fa-users mr-2"></i>Dashboard</h3>
          </div>
          <div class="section-body">
        <div class="card-body pr-2 pl-2">
        <div class="section-body">
        <?php
        $logMsg = Session::get('logMsg');
        if (isset($logMsg)) {
          echo $logMsg;
        }
        $msg = Session::get('msg');
        if (isset($msg)) {
          echo $msg;
        }
        Session::set("msg", NULL);
        Session::set("logMsg", NULL);

        if (isset($_GET['remove_produk'])) {
          $remove_produk = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove_produk']);
          $remove_produk = $users->deleteProdukById($remove_produk);
        }

        if (isset($remove_produk)) {
          echo $remove_produk;
        }

        if (isset($activeId)) {
          echo $activeId;
        }
        $db = new Database();
        $sql = "SELECT COUNT(*) FROM tbl_order WHERE order_id";
        $stmt = $db->pdo->query($sql);
        $countorder = $stmt->fetchColumn();

        $sql = "SELECT COUNT(*) FROM tbl_users WHERE id";
        $stmt = $db->pdo->query($sql);
        $countuser = $stmt->fetchColumn();

        $sql = "SELECT COUNT(*) FROM tbl_produk WHERE product_id ";
        $stmt = $db->pdo->query($sql);
        $countproduk = $stmt->fetchColumn();
        ?>
        <h2 class="section-title">Hi, <?php echo $getUinfo->name; ?></h2>
            <p class="section-lead">
              Selamat Datang !!!
            </p>
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                  <img src='<?php echo $getUinfo->fld_logo; ?>' class="rounded-circle profile-widget-picture" height="100" width="100" >
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                      <div class="profile-widget-item-label">Nama</div>
                        <div class="profile-widget-item-value"><?php echo $getUinfo->name; ?></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Sebagai</div>
                        <div class="profile-widget-item-value">
                        <?php
                          if ( $getUinfo->roleid == '1')  {
                            echo "Admin";
                          } else if ( $getUinfo->roleid == '2')  {
                            echo "Seller";
                          } else if ( $getUinfo->roleid == '3')  {
                            echo "User";
                          } 
                        ?>
                        </div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">No WhatsApp</div>
                        <div class="profile-widget-item-value"><?php echo $getUinfo->mobile; ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?php echo $getUinfo->name; ?><div class="text-muted d-inline font-weight-normal"><div class="slash"></div> 
                    
                    <?php
                    if ( $getUinfo->roleid == '1')  {
                      echo "Admin";
                    } else if ( $getUinfo->roleid == '2')  {
                      echo "Seller";
                    } else if ( $getUinfo->roleid == '3')  {
                      echo "User";
                    } 
                    ?>
                    
                    </div></div>
                    <div class="mb-2 mt-3"><div div></div>
                  </div>
                <!-- </div>

<?php if (Session::get('id') == TRUE) { ?>
                  <?php if (Session::get('roleid') == '1') { ?>
                  <?php echo $countorder ?>
                  <?php echo $countuser ?>
          <?php }} ?>
          <?php if (Session::get('id') == TRUE) { ?>
                  <?php if (Session::get('roleid') == '2') { ?>
                    <?php }} ?> -->

          <h2 id="produk" class="section-title">Data Produk</h2>
          <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '1') { ?>
              <div style="overflow-x:auto;">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">No</th>
                      <th  class="text-center">Penjual</th>
                      <th  class="text-center">Nama Produk</th>
                      <th  class="text-center">Gambar Produk</th>
                      <th  class="text-center">Harga</th>
                      <th  class="text-center">Kategori</th>
                      <th  class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $allUser = $users->selectAllProduct();

                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
                      <?php if (Session::get("product_id") == $value->product_id ) {
                        echo "style='background:#d9edf7' ";
                      } ?>
                      >
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->penjual; ?></td>
                        <td><?php echo $value->namaproduk; ?></td>
                        <td><?php echo '<img src=',$value->fldimage,' height="100" width="100" >'; ?></td>
                        <td><?php echo "Rp. ". number_format($value->harga); ?></td>
                        <td><?php echo $value->kategori; ?></td>
                        <td>
                            <div class="dropdown d-inline">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Options
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item has-icon" href="productDetail.php?id=<?php echo $value->product_id;?>"><i class="fas fa-eye"></i> View</a>
                                <a class="dropdown-item has-icon" href="updateProduk.php?id=<?php echo $value->product_id;?>"><i class="fas fa-edit"></i> Update</a>
                                <a onclick="return confirm('Are you sure To Delete ?')" class="dropdown-item has-icon" href="?remove_produk=<?php echo $value->product_id;?>"><i class="fas fa-trash-alt"></i> Delete</a>
                              </div>
                            </div>
                        </td>
                      </tr>
                    <?php }}else{ ?>
                      <tr class="text-center">
                      <td>No user availabe now !</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>
              </div>
            <?php }} ?>
            <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '2') { ?>
          <?php
          $getUinfo = $users->getUserInfoById(Session::get("id"));
          if ($getUinfo) {
          ?>
          <div style="overflow-x:auto;">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">No</th>
                      <th  class="text-center">Nama Produk</th>
                      <th  class="text-center">Gambar Produk</th>
                      <th  class="text-center">Harga</th>
                      <th  class="text-center">Kategori</th>
                      <th  class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                      $no = 1;
                      $penjual = $getUinfo->name;
                      $link = new Database();
                      $sql = "SELECT * FROM tbl_produk WHERE penjual = :penjual ORDER BY product_id DESC";
                      $stmt = $link->pdo->prepare($sql);
                      $stmt->bindValue(':penjual', $penjual);
                      $stmt->execute();
                      while($data = $stmt->fetch()){
                     ?>
                      <tr class="text-center">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["namaproduk"]; ?></td>
                        <td><?php echo '<img src=',$data["fldimage"],' height="100" width="100" >'; ?></td>
                        <td><?php echo "Rp. ". number_format($data["harga"]); ?></td>
                        <td><?php echo $data["kategori"]; ?></td>
                        <td><a class="btn btn-info btn-sm " href="productDetail.php?id=<?php echo $data["product_id"];?>" target="_blank">View</a>
                            <a class="btn btn-info btn-sm " href="updateProduk.php?id=<?php echo $data["product_id"];?>">Update Produk</a>
                            <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("product_id") == TRUE) {
                      echo "disabled";
                    } ?>
                             btn-sm " href="?remove_produk=<?php echo $data["product_id"];?>">Remove</a>
                        </td>
                      </tr>
                      <?php 
                      $no++;
                      } ?>

                  </tbody>

              </table>
              </div>
              <?php }?>
              <?php }} ?>






        </div>
      </div></div></div></section>



  <?php
  include 'inc/footer.php';
  ?>
