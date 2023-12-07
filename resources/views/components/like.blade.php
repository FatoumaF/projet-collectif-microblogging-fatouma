@props(['postId' => $postId, 'liked' => $liked])

<button class="likeButton" postId="{{ $postId }}" liked={{ $liked }}></button>

<script>
    var xmlhttp = new XMLHttpRequest()
    document.querySelectorAll('.likeButton').forEach(button => {
        const postId = button.getAttribute('postId')
        let liked = button.getAttribute('liked')
        console.log(liked)

        if (liked == 1) {
            button.innerText = 'Supprimer le like'
        } else if(liked == -1) {
            button.innerText = 'Like'
        }

        button.addEventListener('click', () => {
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (button.innerText == 'Supprimer le like') {
                        button.innerText = 'Like'
                    } else if (button.innerText == 'Like') {
                        button.innerText = 'Supprimer le like'
                    }
                } else {
                    console.log('erreur')
                }
            };
            xmlhttp.open('GET', "likeOrDislike/" + postId, true);
            xmlhttp.send();


        })

    });
</script>
