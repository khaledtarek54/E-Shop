<div class="container">
    <div id="demo" class="carousel slide border" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
    
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/11.jpeg" alt="" style="width: 100%;height:350px">
            </div>
            <div class="carousel-item">
                <img src="assets/images/22.jpg" alt="" style="width: 100%;height:350px">
            </div>
            <div class="carousel-item">
                <img src="assets/images/33.jpg" alt="" style="width: 100%;height:350px">
            </div>
        </div>
    
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    
    </div>
</div>
<script>
    $('.carousel').carousel({
        interval: 4000
    })
</script>
