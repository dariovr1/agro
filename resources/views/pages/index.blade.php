@extends("templates.master")

@section("content")
  @include("components.titlePage",[
        "titolo" => $page->titolo    
      ])
  <!-- scroll-down -->

  <div class="container">
      <br/>
      <p><?php echo html_entity_decode($page->descrizione); ?></p>
  </div>

@endsection

<style>

.titleheader {
  position: relative;
  width: 100%; 
  height: 250px;  
}
.titleheader .center {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 90%;
  transform:translate(-50%,-50%);
  z-index: 5; 
  padding: 1rem;
}
.titleheader .left {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 90%;
  transform:translate(-50%,-50%);
  z-index: 5; 
  padding: 1rem;
}
.titleheader .right {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 90%;
  transform:translate(-50%,-50%);
  z-index: 5; 
  padding: 1rem;
}
.titleheader .scroll {
  position: absolute;
  top: 95%;
  left: 50%;
  transform:translate(-50%,-50%);
  color: #fff;
  font-size: 1.5rem;
}
/*=== Large devices (desktops, 992px and up) ===*/
  @media (min-width: 992px) {
  .titleheader .center {
    width: 50%;
  }
  .titleheader .left {
    position: absolute;
    top: 20%;
    left: 10%;
    width: 40%;
    height: 60%;
    transform:translate(0, 0);
    padding: 1rem;
  }
  .titleheader .right {
    position: absolute;
    top: 20%;
    left: 50%;
    width: 40%;
    height: 60%;
    transform:translate(0, 0);
    padding: 1rem;
  }
  .delay {
    animation-delay: 0.6s;
  }
}


/* =======================================
 titleheader#1
========================================*/
#titleheader1 {
  background: #355c7d;
  background: /* gradient overlay */     linear-gradient(       to bottom,       rgb(115, 191, 69), /* #73bf45 */       rgba(93, 191, 69, 0.68) /* #bd3f32 */     ),     /* bottom image */     url(https://cdn.stocksnap.io/img-thumbs/960w/VPYPAS4FVT.jpg) no-repeat left top;
  background-size: cover;
  z-index: 0;
}
#titleheader1 .caption {
  text-align: center;
  color: #fff;
}
#titleheader1 .caption .title {
  margin-bottom: 1.5rem;
} 
#titleheader1 .caption .text {
  margin-bottom: 1.5rem;
}
#titleheader1 .caption .action {
  margin-bottom: 1rem;
  padding-left: 3rem;
  padding-right: 3rem;
  border-radius: 15px;
}


</style>