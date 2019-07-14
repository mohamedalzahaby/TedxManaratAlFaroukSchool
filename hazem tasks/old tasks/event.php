<div class="container">
    <div class="page-header text-center">

        <h1 id="timeline"style="margin-top:670px;margin-right:25px">Our Events</h1>
    </div>
    <ul class="timeline">
        <?php
            $rightSide = true;
            // var_dump($data);
            foreach ($data as $key => $value) {
                $name = $value['name'];
                if (!$rightSide)
                {
                    echo '<li>';
                    echo "<div class='timeline-badge primary'><a><i class='glyphicon glyphicon-record' rel='tooltip' title= '$name' ></i></a></div>";
                } else {
                    echo '<li class="timeline-inverted">';
                    echo "<div class='timeline-badge primary'><a><i class='glyphicon glyphicon-record invert' rel='tooltip' title= '$name'></i></a></div>";
                }
                ?>

                <div class="timeline-panel col-md-2">
                    <div class="timeline-heading">
                        <h3 style="padding-top:10px;padding-bottom:10px;margin-left:15px"><b><?php echo $name; ?></b></h3>
                        <img class="img-responsive" src="res\images\bg-home-2.jpg" />

                    </div>
                    <div class="timeline-body">
                        <p>Reshape the universe in your eyes. Why see the world from only one dimension when there is so much more to it? Seeing things one way doesn't mean that's how they actually are. Sometimes, the answer to any problem that we face is right in front of our eyes, but it's just us who can't see it. Although if we just change our perspective, maybe we'll add more depth and meaning to our world. Perhaps if we look differently, from new perspectives, we would be able to dream more and hopefully achieve more.Through a series of talks, performances, activities and a vast range of ideas; you'll get to inspect different dimensions throughout our event which will leave you with a whole different inner dimension of your own.</p>
                    </div>

                    <div class="timeline-footer">
                        <label>Date:</label> <?php echo $value['date'] . ' From ' . $value['eventStart'] . ' To ' . $value['eventEnd']; ?>
                        <br>
                        <label>Address:</label> <?php echo $value[0]; ?>
                        <br>
                        <br>
                        <!-- <a><i class="glyphicon glyphicon-thumbs-up"></i></a>
                                            <a><i class="glyphicon glyphicon-share"></i></a> -->
                        <?php if ($value['isRegisterationOpened'] == 1) :  ?> <a href="../tedx/register" class="pull-right">Join Now</a>
                        <?php endif; ?>
                    </div>

                </div>
                </li>
                <?php
                if($rightSide == true){
                    $rightSide = false;
                }else{
                    $rightSide = true;
                }
            }
        ?>
        <li class="clearfix" style="float: none;"></li>
    </ul>
</div>

<script>
    $(document).ready(function() {
        var my_posts = $("[rel=tooltip]");

        var size = $(window).width();
        for (i = 0; i < my_posts.length; i++) {
            the_post = $(my_posts[i]);

            if (the_post.hasClass('invert') && size >= 767) {
                the_post.tooltip({
                    placement: 'left'
                });
                the_post.css("cursor", "pointer");
            } else {
                the_post.tooltip({
                    placement: 'rigth'
                });
                the_post.css("cursor", "pointer");
            }
        }
    });
</script>

</body>

</html>
