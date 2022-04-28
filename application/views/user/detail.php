<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/blog.css">
<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/common.js" type="text/javascript"></script>
<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/blog.js" type="text/javascript"></script>
<div class="news">
    <div style="padding: 15px 100px 15px 100px;">
        <div class="row">
            <div class="col-lg-6 news_col">
                <div class="blog_detail_post">
                    <?php if($row->blog_type==1)
                        echo $row->blog_desc;
                    elseif($row->blog_type==2) {?>
                        <img src="<?php echo WEBSITE_ROOT.$row->blog_filepath;?>" alt="" style="width: inherit;">
                    <?php } else {?>
                        <video style="width: 100%;" controls="controls" autoplay="autoplay">
                            <source src="<?php echo WEBSITE_ROOT.$row->blog_filepath;?>" style="width: inherit;" type="video/mp4">
                        </video>
                    <?php }?>
                </div>
            </div>
            <div class="col-lg-1 news_col"></div>
            <div class="col-lg-5 news_col" style="font-size: 18px;">
                <table width="100%" class="table" style="margin-top: 10px; border-collapse: collapse; font-size: 18px;">
                    <tr height="40">
                        <td width="150"><?php echo get_langdata($this->session->userdata('lang'), 'title'); ?></td>
                        <td><?php echo $row->blog_title;?></td>
                    </tr>
                    <tr height="40">
                        <td valign="top"><?php echo get_langdata($this->session->userdata('lang'), 'description'); ?></td>
                        <td><?php echo $row->blog_desc;?></td>
                    </tr>
                    <tr height="40">
                        <td><?php echo get_langdata($this->session->userdata('lang'), 'visitcount'); ?></td>
                        <td><?php echo $row->blog_visit;?></td>
                    </tr>
                    <tr height="40">
                        <td><?php echo get_langdata($this->session->userdata('lang'), 'likecount'); ?></td>
                        <td><?php echo $row->blog_like;?></td>
                    </tr>
                    <tr height="40">
                        <td><?php echo get_langdata($this->session->userdata('lang'), 'commentcount'); ?></td>
                        <td><?php echo $row->blog_comment;?></td>
                    </tr>
                    <tr height="40">
                        <td><?php echo get_langdata($this->session->userdata('lang'), 'reportcount'); ?></td>
                        <td><?php echo $row->blog_report;?></td>
                    </tr>
                    <tr height="40">
                        <td><?php echo get_langdata($this->session->userdata('lang'), 'postdate'); ?></td>
                        <td><?php echo $row->blog_date;?></td>
                    </tr>
                    <tr height="40">
                        <td><?php echo get_langdata($this->session->userdata('lang'), 'poster'); ?></td>
                        <td><?php echo $row->user_idt;?></td>
                    </tr>
                    <tr height="60">
                        <td colspan="2" align="right">
                            <button type="button" class="btn btn-primary" onclick="javascript:history.back();">
                                <i class="fa fa-history"></i>
                                <?php echo get_langdata($this->session->userdata('lang'), 'back'); ?>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>