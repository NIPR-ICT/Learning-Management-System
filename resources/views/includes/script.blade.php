<script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownLinks = document.querySelectorAll('a[data-has-submenu="true"]');
            const subMenuLinks = document.querySelectorAll('a[data-has-submenu="false"]');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');

            dropdownLinks.forEach(link => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    const dropdown = link.nextElementSibling;
                    dropdown.classList.toggle('hidden');
                });
            });

            // Hide sidebar and submenu when a link with no submenu is clicked
            subMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    sidebar.classList.add('hidden');
                    dropdownLinks.forEach(dropdownLink => {
                        const dropdown = dropdownLink.nextElementSibling;
                        dropdown.classList.add('hidden');
                    });
                });
            });

            // Toggle sidebar on small screens
            // sidebarToggle.addEventListener('click', () => {
            //     sidebar.classList.toggle('hidden');
            //     sidebar.classList.toggle('show');
            // });
        });



        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
        function addToWishList(course_id){
            $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishlist/"+course_id,
            success:function(data){

            wishlist();

                  // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 6000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message
            }
        })
        }


        function wishlistRemove(id){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/wishlist-remove/"+id,
            success:function(data){
             wishlist();
                 // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 6000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message
            }
        })
        }

        function wishlist(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/student/wishlist/",
            success:function(response){
                $('#wishQty').text(response.wishQty);
                var rows = ""
                $.each(response.wishlist, function(key, value){
                    rows += `

                                    <li>
                                        <div class="media">
                                            <div class="d-flex media-wide">
                                                <div class="avatar">
                                                    <a href="course-details.html">
                                                        <img alt="Img" src="storage/${value.course.cover_image}">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6><a href="course-details.html">${value.course.title}</a></h6>
                                                   <!-- <p>By Dave Franco</p> -->
                                                    <h5>&#8358;${value.course.course_amount}</h5>
                                                    <div class="remove-btn">
                                                        <a href="#" id="${value.id}" onclick="wishlistRemove(this.id)" class="btn ">Remove</a>
                                                        <a href="#" class="btn">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
             `
            });
               $('#wishlist').html(rows);
            }
        })
    }
    wishlist();

    /// End WishList Remove //

    function addToCart(courseId,instructorId,slug,title){
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                course_name: title,
                course_name_slug: slug,
                instructor: instructorId
            },
            url: "/cart/data/store/"+ courseId,
            success: function(data) {
                miniCart();
                // Start Message
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 6000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message

            }
        })
    }

    function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/course/mini/cart',
            dataType: 'json',
            success:function(response){
                $('#cartSubTotal').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts, function(key,value){
                    miniCart += `

                        <li>
                                        <div class="media">
                                            <div class="d-flex media-wide">
                                                <div class="avatar">
                                                    <a href="course-details.html">
                                                        <img alt="Img" src="storage/${value.options.image}">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6><a href="course-details.html">${value.name}</a></h6>
                                                  <!--  <p>By Dave Franco</p> -->
                                                    <h5>&#8358;${value.price}</h5>
                                                </div>
                                            </div>
                                            <div class="remove-btn">
                                                <a href="#" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="btn">Remove</a>
                                            </div>
                                        </div>
                                    </li>

                        `
                });
                $('#miniCart').html(miniCart);
            }
        })
    }
    miniCart();

     // Mini Cart Remove Start
     function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/course/remove/'+rowId,
            dataType: 'json',
            success:function(data){
            miniCart();
            cart()
            // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success,
                    })
            }else{

              Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error,
                    })
                }
              // End Message
            }
        })
    }
    // End Mini Cart Remove

    function cart(){
        $.ajax({
            type: 'GET',
            url: '/get-cart-course',
            dataType: 'json',
            success:function(response){
                $('#cartTotal').text('Total '+response.cartTotal);
                $('#cartQtyz').text(response.cartQty );
                // alert(response.cartTotal)
                var rows = ""
                $.each(response.carts, function(key,value){
                    rows += ` 
                                <div class="col-lg-12 col-md-12 d-flex">
                                    <div class="course-box course-design list-course d-flex">
                                        <div class="product">
                                            <div class="product-img">
                                                <a href="course-details.html">
                                                    <img class="img-fluid" alt="Img" src="storage/${value.options.image}">
                                                </a>
                                                <div class="price">
                                                    <h3 class="free-color">&#8358;${value.price}</h3>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="head-course-title">
                                                    <h3 class="title"><a href="course-details.html"> ${value.name}</a></h3>
                                                </div>
                                                <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="assets/img/icon/icon-01.svg" alt="Img">
                                                        <p>12+ Lesson</p>
                                                    </div>
                                                    <div class="course-view d-flex align-items-center">
                                                        <img src="assets/img/icon/icon-02.svg" alt="Img">
                                                        <p>9hr 30min</p>
                                                    </div>
                                                </div>
                                                <div class="rating">							
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                                </div>
                                            </div>
                                            <div class="cart-remove">
                                                <a href="javascript:void(0);"  id="${value.rowId}" onclick="miniCartRemove(this.id)"  class="btn btn-primary">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              

                `
                });
                $('#cartPage').html(rows);
            }
        })
    }
    cart()
    </script>

