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
                                                    <h5>${value.course.course_amount}</h5>
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

    function addToCart(courseId,){
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
                // course_name: courseName,
                // course_name_slug: slug,
                // instructor: instructorId
            },
            url: "/cart/data/store/"+ courseId,
            success: function(data) {
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

    </script>

