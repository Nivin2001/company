<?php
require('header.php');
?>
<?php
require('connection.php');
$query="SELECT * FROM admin";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){//اذا كان اكتر من سطر
    $admins=mysqli_fetch_all($result,MYSQLI_ASSOC); // ترجعلي البيانات في assoc بدلا من index
}else{
        $msg="no data found";
      
    }
    
?>


    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                    <a heef=# class="btn btn-success"> add admin </a>
                </div>
                

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                       
                    <?php  
                    if(!empty($admins)):
                      foreach($admins as $index=>$admin):  
                     // اسم المصفوفة admins 
                    //حولتها ل assoc
                    //as admin
                    //بطبع محتويات المصفوفة بعدها
                    //<?= بدل echo
                    // المعلومات انطبعت بدون م يدخل ع php mu admin 
                    //index يطبع من 1
                    // لازم يكون في شرط  ميشان يدخل ع foreach
                        ?>
                      <tr>
                        <th scope="row"><?= $index +1 ?></th>
                        <td><?= $admin['name']?></td>
                        <td> <?= $admin['email']?></td>
                        <td> <?php 
                        if ($admin['status']==1):?>
                        <i class="fas fa-check"></i>
                         <?php
                        else:?>
                       <span class="badge badge-danger">
                       <i class="fas fa-times"></i>
                        </span>
                          
                            <?php endif;
                        ?></td>

                        <td>
                            <a class="btn btn-sm btn-info" href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="#">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach;
                      else:
                        echo $msg;
                      endif;
                      ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php require_once('footer.php');?>
    