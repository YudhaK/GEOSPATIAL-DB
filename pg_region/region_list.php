<?php
include "master/pg_region/_constants.php";
?>
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-lg-6 col-md-4 col-sm-4">
                           <h4 class="nav_top_align">
                               Region
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
                                   <a href="#"> Region</a>
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
                                    <i class="fa fa-table"></i> Data Region
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
                                            <th>Name</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        $q = mysql_query("SELECT 
                                                region.id,
                                                region.url,
                                                region.name,
                                                region.description
                                                FROM
                                                region
                                                ORDER BY region.id DESC
                                                ") or die (mysql_error());
                                        while ($r = mysql_fetch_array($q)) {
                                            $id = base64_encode($r['id']);
                                            $name = base64_encode($r['name']);
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
                                                           <a class="dropdown-item for-act" 
                                                           href="?route=<?php echo md5('region_detail')."&p=$id"?>">
                                                           <i class="fa fa-search"></i> Detail</a>
                                                           <a class="dropdown-item for-act adv_cust_mod_btn" data-toggle="modal"
                                                            data-href="#edit<?= $r['id'];?>" href="#edit<?= $r['id'];?>" href="#">
                                                            <i class="fa fa-pencil"></i> Ubah</a>
                                                           <a class="dropdown-item for-act" 
                                                           href="?route=<?php echo md5('region_act')."&p=$id&q=$name&act=$act_del"?>"
                                                           onclick="return confirm('Apakah anda yakin?')">
                                                           <i class="fa fa-trash"></i> Hapus</a>
                                                       </div>
                                                   </div>
                                                </td>
                                                <td><?= $r['name'];?></td>
                                                <td><?= $r['description'];?></td>
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
                                                                    <form action="?route=<?php echo md5('region_act')?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id" value="<?= $r['id'];?>">
                                                                        <input type="hidden" name="url_lama" value="<?= $r['url'];?>">
                                                                        <input type="hidden" name="act" value="edit">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="required2" class="col-form-label">Name *</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="text" name="name" class="form-control" required value="<?= $r['name'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="required2" class="col-form-label">Upload</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                    <div class="fileinput-new text-center">
                                                                                        <?= $r['url'];?>
                                                                                    </div>
                                                                                    <div class="fileinput-preview fileinput-exists"></div>
                                                                                    <div class="m-t-20 text-center">
                                                                                        <span class="btn btn-info btn-file">
                                                                                        <span class="fileinput-new">Pilih File</span>
                                                                                        <span class="fileinput-exists">Ganti</span>
                                                                                        <input type="file" name="upload_url"></span>
                                                                                        <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-4  text-lg-right">
                                                                                <label for="required2" class="col-form-label">Description *</label>
                                                                            </div>
                                                                            <div class="col-lg-8">
                                                                                <textarea name="description" class="form-control"><?= $r['description'];?></textarea>
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
                                <form action="?route=<?php echo md5('region_act')?>" method="post" 
                                    class="form-horizontal" enctype="multipart/form-data">
                                    <input type="hidden" name="act" value="add">
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Name *</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="uploadUrl">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Upload</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists"></div>
                                                <div class="m-t-20 text-center">
                                                    <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new">Pilih File</span>
                                                    <span class="fileinput-exists">Ganti</span>
                                                    <input type="file" name="upload_url"></span>
                                                    <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Description *</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <textarea name="description" class="form-control"></textarea>
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