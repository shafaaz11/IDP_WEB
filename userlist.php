<?php
include 'inc/header.php';

Session::CheckSession();
?>
 <div class="main-content">
 <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '1') { ?>
        <section class="section">
          <div class="section-header">
          <h3><i class="fas fa-users mr-2"></i>User list </h3>
          </div>
          <div class="section-body">
        <div class="card-body pr-2 pl-2">
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

if (isset($_GET['remove'])) {
          $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
          $remove = $users->deleteUserById($remove);
        }        
        if (isset($remove)) {
          echo $remove;
        }

if (isset($activeId)) {
  echo $activeId;
}
        ?>
              <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">No</th>
                      <th  class="text-center">Foto</th>
                      <th  class="text-center">name</th>
                      <th  class="text-center">Email address</th>
                      <th  class="text-center">No Wa</th>
                      <th  width='25%' class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $allUser = $users->selectAllUserData();

                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
                      <?php if (Session::get("id") == $value->id) {
                        echo "style='background:#d9edf7' ";
                      } ?>
                      >

                        <td><?php echo $i; ?></td>
                        <td><?php echo '<img src=',$value->fld_logo,' height="100" width="100" >'; ?></td>
                        <td><?php echo $value->name; ?> <br>
                          <?php if ($value->roleid  == '1'){
                          echo "<span class='badge badge-lg badge-info text-white'>Admin</span>";
                        } elseif ($value->roleid == '2') {
                          echo "<span class='badge badge-lg badge-dark text-white'>Seller</span>";
                        } ?></td>
                        <td><?php echo $value->email; ?></td>

                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->mobile; ?></span></td>
                        <td>
                          <?php if ($value->isActive == '0') { ?>
                        
                        <?php }else{ ?>
                        <?php } ?>

                          <?php if ( Session::get("roleid") == '1') {?>
                            <a class="btn btn-success btn-sm
                            " href="profile.php?id=<?php echo $value->id;?>">View</a>
                            <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                            <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                      echo "disabled";
                    } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Remove</a>

                      



                        <?php  }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '2'){ ?>
                          <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">View</a>
                          <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php  }elseif( Session::get("roleid") == '2'){ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">View</a>
                          <a class="btn btn-info btn-sm
                          <?php if ($value->roleid == '1') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php }elseif(Session::get("id") == $value->id  && Session::get("roleid") == '3'){ ?>
                          <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">View</a>
                          <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Edit</a>
                        <?php }else{ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->roleid == '1') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">View</a>

                        <?php } ?>

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
              <?php  }} ?>
              <?php if (Session::get('id') == TRUE) { ?>
                <?php if (Session::get('roleid') == '2') { ?>
                  <div class="card">
                  <div class="card-header">
                    <h4>Not Found</h4>
                  </div>
                  <div class="card-body">
                    <div class="empty-state" data-height="600">
                      <img class="img-fluid" src="assets/img/drawkit/drawkit-nature-man-colour.svg" alt="image">
                      <h2 class="mt-0">Looks like you got lost</h2>
                      <p class="lead">
                        We can't find the path you're looking for, check the path again and try again.
                      </p>
                      <a href="dashboard.php" class="btn btn-warning mt-4">Dashboard</a>
                      <a href="index.php" class="mt-4 bb">Home</a>
                    </div>
                  </div>
                </div>
                  <?php }} ?>








        </div>
      </div></div></div></section>



  <?php
  include 'inc/footer.php';

  ?>
