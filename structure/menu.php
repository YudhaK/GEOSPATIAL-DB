    <div class="wrapper">
        <div id="left">
            <div class="menu_scroll">
                <ul id="menu">
                    <li>
                        <a href="<?= $site_base;?>">
                            <i class="fa fa-home text-default"></i>
                            <span class="link-title menu_hide">&nbsp; Dashboard</span>
                        </a>
                    </li>
                    <!-- setting -->
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-cogs text-default"></i>
                            <span class="link-title menu_hide">&nbsp; Setting</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="?route=<?php echo md5('user')?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; User
                                </a>
                            </li>
                            <li>
                                <a href="?route=<?php echo md5('info')?>">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Info
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- setting ends -->
                    <!-- region -->
                    <li>
                        <a href="?route=<?php echo md5('region')?>">
                            <i class="fa  fa-globe text-default"></i>
                            <span class="link-title menu_hide">&nbsp; region</span>
                        </a>
                    </li>
                    <!-- region ends -->
                    <!-- laporan -->
                    <li>
                        <a href="?route=<?php echo md5('laporan')?>">
                            <i class="fa  fa-book text-default"></i>
                            <span class="link-title menu_hide">&nbsp; laporan</span>
                        </a>
                    </li>
                    <!-- laporan ends -->
                </ul>
                <!-- /#menu -->
            </div>
        </div>
        <!-- /#left -->