<?php include "./Views/Common/header.php" ?>
<?php include "./Views/Common/menu.php" ?>

        <div class="row">
            <!-- bản đồ chỉ đường -->
            <div class="col-md-12 p-b-30">
                <h4 class="m-text26 p-b-36">
                    Địa Chỉ Cửa Hàng
                </h4>
                <div class="contact-map size21" id="google_map" data-map-x="21.010384" data-map-y="105.838682"
                     data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1">
                    <iframe class="contact-map size21"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.793123234352!2d105.838682!3d21.010384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ae5369fd9f07%3A0x548fdb4fe8ccf512!2zVGjGsOG7nW5nIERhbyBsaWFvIFphbyBz4buH!5e0!3m2!1svi!2s!4v1551405879411"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- thông tin liên hệ -->
            <div class="col-md-12 p-b-30">
                <h4 class="m-text26 p-b-36">
                    Liên hệ Với Chúng Tôi
                </h4>
                <form action="." method="post" class="leave-comment">
                    <input type="hidden" name="action" value="send_mail">
                    <input type="hidden" name="controller" value="Controller">
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Tên của bạn" required>
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email của bạn" required>
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="subject" placeholder="Tiêu đề" required>
                    </div>

                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Lời nhắn" required></textarea>

                    <div class="w-size25">
                        <?php if (isset($_SESSION['user'])): ?>
                            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Gửi
                            </button>
                        <?php else: ?>
                            <p>Bạn cần đăng nhập để gửi góp ý</p>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "./Views/Common/footer.php" ?>
