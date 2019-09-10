
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-lg-6 col-md-4 col-sm-4">
                           <h4 class="nav_top_align">
                               Info
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
                                   <a href="#"> Info</a>
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
                                    <i class="fa fa-table"></i> Data Info
                                </div>
                                <div class="card-block">
                                    <table id="myDataTable" class="display table table-stripped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="1%">No.</th>
                                            <th width="1%">Aksi</th>
                                            <th>Info Key</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        $q = mysql_query("SELECT 
                                                *
                                                FROM
                                                info
                                                ") or die (mysql_error());
                                        while ($r = mysql_fetch_array($q)) {
                                            $id = base64_encode($r['info_key']);
                                            $kode = base64_encode($r['info_key']);
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
                                                            data-href="#edit<?= $r['info_key'];?>" href="#edit<?= $r['info_key'];?>" href="#">
                                                            <i class="fa fa-pencil"></i> Ubah</a>
                                                       </div>
                                                   </div>
                                                </td>
                                                <td><?= $r['info_key'];?></td>
                                            </tr>

                                            <!--- responsive model -->
                                            <div class="modal fade in display_none" id="edit<?= $r['info_key'];?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title text-white">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="?route=<?php echo md5('info_act')?>" method="post" 
                                                                        class="form-horizontal" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id" value="<?= $r['info_key'];?>">
                                                                        <input type="hidden" name="act" value="edit">
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-2  text-lg-right">
                                                                                <label for="required2" class="col-form-label">Info Key *</label>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <input type="text" id="required2" name="kode" class="form-control" value="<?= $r['info_key'];?>" required readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-lg-2  text-lg-right">
                                                                                <label for="required2" class="col-form-label">Content *</label>
                                                                            </div>
                                                                            <div class="col-lg-8">
                                                                                <textarea class="textarea form_editors_textarea_wysihtml" name="content"><?= $r['content'];?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="form-actions form-group row">
                                                                            <div class="col-lg-2 push-lg-2">
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