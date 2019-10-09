<?php
  ob_start();
  session_start();
  if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
    include 'connectPDO.php';
    include 'includes/functions/funcs.php';
    
    if($_GET['id']){
    include 'includes/header.php';
    if($_GET['page'] == 'histoory' 
    || $_GET['page'] == 'examination' 
    || $_GET['page'] == 'reimplant' 
    || $_GET['page'] == '3_months'
    || $_GET['page'] == '6_months'
    || $_GET['page'] == '9_months'
    || $_GET['page'] == 'yrs_5_3'
    || $_GET['page'] == 'yrs_5_2'
    || $_GET['page'] == 'yr_5_1'
    || $_GET['page'] == 'yr_1'
    || $_GET['page'] == '2yrs'
    || $_GET['page'] == '3yrs'
    || $_GET['page'] == '4yrs'
     ){
            $page = $_GET['page'];
            $stmt1 = $connect->prepare('SELECT * FROM '.$page.' where serial_number = ?'); 
            $stmt1->execute(array($_GET['id']));
            $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $row = $stmt1->rowCount();

        ?>

        <div class="container-fluid">
            <div class="row-fluid">
            <?php include './includes/nav.php';?>

                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                    <?php include './includes/side.php';?>

                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">data</div>
                                <div class="pull-right"><span class="badge badge-info"><?=$row?></span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                            <?php
                                $v = 0;
                                foreach ($row1 as $key => $value) {
                                    echo' <div class="span12 panel panel-default"style="border-bottom: 2px solid #000;margin: 0 26px;">
                                        
                                            <div class="span6 panel " style="
                                            background: #c8f1af;
                                            padding: 10px;
                                        ">'.$key.'</div>
                                        
                                        ';
                                        if($value == Null){
                                            echo ' <div class="span6 panel-footer" style="padding: 10px;position:relative">empty 
                                                <button style="position: absolute;top: 5px;right: 25px;"
                                                    type="button" class="btn btn-success"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal'.$v.'">
                                                        edit
                                                </button>
                                            <div class="modal fade" id="exampleModal'.$v.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="edit.php" method="post">
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">'.$key.'</label>
                                                        <input type="text" class="form-control" name="value" value="'.$value.'" id="exampleInputPassword1" placeholder="'.$key.'">
                                                        <input type="hidden" class="form-control" name="table" value="'.$_GET['page'].'" id="exampleInputPassword1" placeholder="'.$key.'">
                                                        <input type="hidden" class="form-control" name="num" value="'.$_GET['id'].'" id="exampleInputPassword1" placeholder="'.$key.'">
                                                        <input type="hidden" class="form-control" name="key" value="'.$key.'" id="exampleInputPassword1" placeholder="'.$key.'">
                                            </div>
                                                
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    </form>         
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>';
                                        }else{
                                        echo '<div class="span6 panel-footer" style="
                                        padding: 10px 71px 10px 10px;position:relative">'.$value.'
                                        <button style="position: absolute;top: 5px;right: 25px;"
                                        type="button" class="btn btn-success"
                                        data-toggle="modal"
                                        data-target="#exampleModal'.$v.'">
                                            edit
                                    </button>
                                <div class="modal fade" id="exampleModal'.$v.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="edit.php" method="post">
                                        
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">'.$key.'</label>
                                            <input type="text" class="form-control" name="value" value="'.$value.'" id="exampleInputPassword1" placeholder="'.$key.'">
                                            <input type="hidden" class="form-control" name="table" value="'.$_GET['page'].'" id="exampleInputPassword1" placeholder="'.$key.'">
                                            <input type="hidden" class="form-control" name="num" value="'.$_GET['id'].'" id="exampleInputPassword1" placeholder="'.$key.'">
                                            <input type="hidden" class="form-control" name="type" value="'.gettype($value).'" id="exampleInputPassword1" placeholder="'.$key.'">
                                            <input type="hidden" class="form-control" name="key" value="'.$key.'" id="exampleInputPassword1" placeholder="'.$key.'">
                                            </div>
                                    
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        </form>         
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                        </div>';}
                                        echo'
                                    </div>
                                    <hr/>
                                    ';
                                    $v++;
                                }
                            ?>
                            </div>
                        </div>
                        <!-- Button trigger modal -->


        <!-- Modal -->
                                
                        <!-- /block -->
                    </div>
                </div>
            </div>
            <hr>
            
            <?php 
        }
    
        include './includes/footer.php';
                            }
}else{
 header('location:login.php');
    exit();
}
        ?>
