@props(['userId' => $userId, 'followed' => $followed])

<button class="followButton" userId="{{ $userId }}" followed={{ $followed }}></button>

<script>
    var xmlhttp = new XMLHttpRequest()
    document.querySelectorAll('.followButton').forEach(button => {
        const userId = button.getAttribute('userId')
        let followed = button.getAttribute('followed')

        if (followed == 1) {
            button.innerText = 'Unfollow'
        } else if(followed == -1) {
            button.innerText = 'Follow'
        }

        button.addEventListener('click', () => {
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    if (button.innerText == 'Unfollow') {
                        button.innerText = 'Follow'
                        
                    } else if (button.innerText == 'Follow') {
                        button.innerText = 'Unfollow'
                    }
                    let followers = button.parentElement.querySelector('.followers')
                    followers.innerText = parseInt(followers.innerText)+parseInt(this.response)
                } else {
                    console.log('erreur')
                }
            };
            xmlhttp.open('GET', "followOrUnfollow/" + userId, true);
            xmlhttp.send();


        })

    });
</script>