
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-lg-6 col-md-4 col-sm-4">
                           <h4 class="nav_top_align">
                               User
                           </h4>
                       </div>
                       <div class="col-lg-6 col-md-8 col-sm-8">
                           <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                               <li class="breadcrumb-item">
                                   <a href="<?= $site_base;?>">
                                       <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                   </a>
                               </li>
                               <li class="breadcrumb-item">
                                   <a href="#"> User</a>
                               </li>
                           </ol>
                       </div>
                   </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="row">
                        <div class="col-12 data_tables">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fa fa-table"></i> Data User
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <a class="btn btn-primary btn-md adv_cust_mod_btn" data-toggle="modal"
                                                data-href="#add" href="#add"><i class="fa fa-plus"></i> Tambah</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="myDataTable" class="display table table-stripped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="1%">No.</th>
                                            <th width="1%">Aksi</th>
                                            <th>name</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        $q = mysql_query("SELECT 
                                                user.id AS id,
                                                user.name AS user_name,
                                                user.username,
                                                user.password_read,
                                                _level.name AS level_name
                                                FROM
                                                user
                                                INNER JOIN _level ON _level.id = user.level_id
                                                ORDER BY user.id DESC
                                                ") or die (mysql_error());
                                        while ($r = mysql_fetch_array($q)) {
                                            $id = base64_encode($r['id']);
                                            $name = base64_encode($r['username']);
                                            $act_del = base64_encode("delete");
                                            $i++;
                                        ?>
                                            <tr>
                                                <td><?= $i;?></td>
                                                <td>
                                                   <div class="dropdown">
                                                       <button class="btn btn-sm btn-secondary dropdown-toggle"
                                                               type="button" id="about-us1" data-toggle="dropdown"
                                                               aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-cog"></i>
                                                       </button>
                                                       <div class="dropdown-menu" aria-labelledby="about-us1">
                                                           <a class="dropdown-item for-act adv_cust_mod_btn" data-toggle="modal"
                                                            data-href="#edit<?= $r['id'];?>" href="#edit<?= $r['id'];?>" href="#">
                                                            <i class="fa fa-pencil"></i> Ubah</a>
                                                           <a class="dropdown-item for-act" 
                                                           href="?route=<?php echo md5('user_act')."&p=$id&q=$name&act=$act_del"?>"
                                                           onclick="return confirm('Apakah anda yakin?')">
                                                           <i class="fa fa-trash"></i> Hapus</a>
                                                       </div>
                                                   </div>
                                                </td>
                                                <td><?= $r['user_name'];?></td>
                                                <td><?= $r['username'];?></td>
                                                <td><?= $r['level_name'];?></td>
                                            </tr>

                                            <!--- responsive model -->
                                            <div class="modal fade in display_none" id="edit<?= $r['id'];?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="?route=<?php echo md5('user_act')?>" method="post" class="form-horizontal">
                                                                        <input type="hidden" name="id" value="<?= $r['id'];?>">
                                                                        <input type="hidden" name="act" value="edit">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="" class="col-form-label">Level *</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="text" name="level_id" class="form-control" value="<?= $r['level_name'];?>" required readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="" class="col-form-label">name *</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="text" name="name" class="form-control" value="<?= $r['user_name'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="" class="col-form-label">Username *</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="text" name="username" class="form-control" value="<?= $r['username'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="" class="col-form-label">Password *</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="text" name="password" class="form-control" value="<?= $r['password_read'];?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-actions form-group row">
                                                                            <div class="col-lg-4 push-lg-4">
                                                                                <input type="submit" value="Simpan" class="btn btn-primary" 
                                                                                onclick="return confirm('Apakah anda yakin?')">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END modal-->
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--- responsive model -->
        <div class="modal fade in display_none" id="add" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title text-white">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="?route=<?php echo md5('user_act')?>" method="post" 
                                    class="form-horizontal">
                                    <input type="hidden" name="act" value="add">
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Level *</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <select class="form-control chzn-select" name="level_id" id="level" required>
                                                <option value="">-- Pilih Level --</option>
                                                <?php 
                                                    $qC = mysql_query("SELECT id, name FROM _level ORDER BY name ASC");
                                                    while ($rC = mysql_fetch_array($qC)) {
                                                        echo "<option value='$rC[id]'>$rC[name]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">name *</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Username *</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="username" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Password *</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="text" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-actions form-group row">
                                        <div class="col-lg-4 push-lg-4">
                                            <input type="submit" value="Simpan" class="btn btn-primary" 
                                            onclick="return confirm('Apakah anda yakin?')">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END modal-->