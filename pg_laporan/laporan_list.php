        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                   <div class="row no-gutters">
                       <div class="col-lg-6 col-md-4 col-sm-4">
                           <h4 class="nav_top_align">
                               Laporan
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
                                   <a href="#"> Laporan</a>
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
                                    <i class="fa fa-table"></i> Data Laporan
                                </div>
                                <div class="card-block">
                                    <table id="myDataTable" class="display table table-stripped table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="1%">No.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Content</th>
                                            <th>Image</th>
                                            <th>Post Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        $q = mysql_query("SELECT 
                                                *
                                                FROM
                                                laporan
                                                ORDER BY post_time DESC
                                                ") or die (mysql_error());
                                        while ($r = mysql_fetch_array($q)) {
                                            $id = base64_encode($r['id']);
                                            $name = base64_encode($r['name']);
                                            $i++;
                                        ?>
                                            <tr>
                                                <td><?= $i;?></td>
                                                <td><?= $r['nama'];?></td>
                                                <td><?= $r['nik'];?></td>
                                                <td><?= $r['content'];?></td>
                                                <td><img src="upload/image/<?= $r['image'];?>" width="100" height="100"></td>
                                                <td><?= $r['post_time'];?></td>
                                            </tr>
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