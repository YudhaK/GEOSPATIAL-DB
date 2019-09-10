<?php
$id = base64_decode($_GET['p']);
$qI = mysql_query("SELECT 
                      region.id,
                      region.url,
                      region.name,
                      region.description
                      FROM
                      region
                      WHERE 
                      region.id = '$id'
                      ") or die (mysql_error());
$rI = mysql_fetch_array($qI);
?>
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-lg-6 col-md-4 col-sm-4">
                           <h4 class="nav_top_align">
                                Detail Region
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
                                   <a href="#"> Detail Region</a>
                               </li>
                           </ol>
                       </div>
                   </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <input type="hidden" name="act" value="add">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-default">
                                    Detail Region
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-6">
                                          <table class="table">
                                              <tr>
                                                <td width="100">Name</td>
                                                <td width="1">:</td>
                                                <td><?= $rI['name'];?></td>
                                              </tr>
                                              <tr>
                                                <td>Description</td>
                                                <td>:</td>
                                                <td><?= $rI['description'];?></td>
                                              </tr>
                                          </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                          <table class="table table-bordered">
                                              <tr>
                                                <th colspan="6">
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                      <u>Points</u> 
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                      <a class="btn btn-primary btn-md adv_cust_mod_btn" data-toggle="modal"
                                                          data-href="#add" href="#add"><i class="fa fa-plus"></i> Tambah</a>
                                                    </div>
                                                  </div>
                                                </th>
                                              </tr>
                                              <tr>
                                                <th width="1">No.</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th width="1"></th>
                                              </tr>
                                              <?php
                                              $i = 0;
                                              $q = mysql_query("SELECT
                                                    *
                                                    FROM 
                                                    point 
                                                    WHERE 
                                                    point.region_id = '$id'
                                                    ORDER BY point.id DESC
                                                    ") or die (mysql_error());
                                              while ($r = mysql_fetch_array($q)) {
                                                $i++;
                                                $deletePoint = base64_encode("delete_point");
                                                $idPoint = base64_encode($r['id']);
                                              ?>
                                                <tr>
                                                  <td><?= $i;?></td>
                                                  <td><?= $r['name'];?></td>
                                                  <td><?= $r['description'];?></td>
                                                  <td><?= $r['latitude'];?></td>
                                                  <td><?= $r['longitude'];?></td>
                                                  <td>
                                                    <a class="btn btn-sm btn-danger" 
                                                    href="?route=<?php echo md5('region_act')."&p=$_GET[p]&q=$idPoint&act=$deletePoint"?>"
                                                    onclick="return confirm('Apakah anda yakin?')">
                                                    <i class="fa fa-trash"></i></a>
                                                  </td>
                                                </tr>
                                              <?php
                                              }
                                              ?>
                                          </table>
                                        </div>
                                    </div>
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
                                    <input type="hidden" name="act" value="add_point">
                                    <input type="hidden" name="region_id" value="<?= $id;?>">
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Name *</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="name" class="form-control" required>
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
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Latitude *</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="latitude" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4  text-lg-right">
                                            <label for="required2" class="col-form-label">Longitude *</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="longitude" class="form-control" required>
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