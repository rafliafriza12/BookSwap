const tooglePassword = () => {
    try {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        const eyeIcon = document.getElementById("eye-icon");
    
        togglePassword.addEventListener("click", function () {
            const type =
                passwordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordInput.setAttribute("type", type);
            if (type === "text") {
                eyeIcon.innerHTML = ` <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    `;
            } else {
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    `;
            }
        });
    } catch (error) {
        console.log(error);
    }
};
const toogleConfirmPassword = () => {
    try {
        const passwordInput = document.getElementById("confirm-password");
        const togglePassword = document.getElementById("toggleConfirmPassword");
        const eyeIcon = document.getElementById("eye-icon-confirm");
    
        togglePassword.addEventListener("click", function () {
            const type =
                passwordInput.getAttribute("type") === "password"
                    ? "text"
                    : "password";
            passwordInput.setAttribute("type", type);
            if (type === "text") {
                eyeIcon.innerHTML = ` <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    `;
            } else {
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    `;
            }
        });
    } catch (error) {
        console.log(error);
    }
};

const sideBarToggle = () => {
    try {
        const burgerButton = document.getElementById('burger');
        burgerButton.addEventListener('click', () => {
            const sideBar = document.getElementById('side');
            sideBar.classList.contains('hidden') ? sideBar.classList.remove('hidden') : sideBar.classList.add('hidden');
        });
    } catch (error) {
        
    }
}

const dropdownToggle = () => {
    try {
        const button = document.getElementById('dropdownButton');
        button.addEventListener('click', () => {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.contains('hidden') ? dropdown.classList.remove('hidden') : dropdown.classList.add('hidden');
        });
        window.addEventListener("click", (event)  => {
            const dropdown = document.getElementById('dropdown');
            if (!event.target.matches('#dropdownButton')) {
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    } catch (error) {
        
    }
}

const chatToggle = () =>{
    try {
        const chatButton = document.getElementById('chat-button');
        const sideBar = document.getElementById('side');
        const chat = document.getElementById('chat');
        chatButton.addEventListener('click', () => {
            chat.classList.contains('hidden') ? chat.classList.remove('hidden') : chat.classList.add('hidden');
            sideBar.classList.contains('hidden') ? sideBar.classList.remove('hidden') : sideBar.classList.add('hidden');
        })
        const closeChat = document.getElementById('close-chat');
        closeChat.addEventListener('click', () => {
            chat.classList.contains('hidden') ? chat.classList.remove('hidden') : chat.classList.add('hidden');
            sideBar.classList.contains('hidden') ? sideBar.classList.remove('hidden') : sideBar.classList.add('hidden');
        });
    } catch (error) {
        
    }
}

const cannotBorrow = () => {
    try {
        const open = document.getElementById('tidak-pinjam');
        const x = document.getElementById('close-modal-tdk');
        const close = document.getElementById('button-tdk');
        const modal = document.getElementById('crud-modal-tdk');
        open.addEventListener('click', () => {
            modal.classList.contains('hidden') ? modal.classList.remove('hidden') : modal.classList.add('hidden');
        })

        x.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        close.addEventListener('click', () => {
            modal.classList.add('hidden');
        })
    } catch (error) {
        console.log(error);
    }
}

const canBorrow = () => {
    try {
        const open = document.getElementById('pinjam-button');
        const close = document.getElementById('close-modal-borrow');
        const modal = document.getElementById('crud-modal-borrow');
        open.addEventListener('click', () => {
            modal.classList.remove('hidden');
        })
        close.addEventListener('click', () => {
            modal.classList.add('hidden');
        })
    } catch (error) {
        console.log(error);
    }
}

const deleteMyBook = (id) => {
    try {
        const open = document.getElementById(`delete-${id}`);
        const close = document.getElementById(`close-modal-delete-${id}`);
        const modal = document.getElementById(`crud-modal-delete-${id}`);
        open.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
        close.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        window.addEventListener("click", (event)  => {
            const modal1 = document.getElementById(`crud-modal-${id}`);
            if (!event.target.matches(`delete-${id}`)) {
                if (!modal1.classList.contains('hidden')) {
                    modal1.classList.add('hidden');
                }
            }
        });
    } catch (error) {
        console.log(error);
    }
}

const search = () => {
    try {
        const searchInput = document.getElementById('search');
        searchInput.addEventListener('keyup', (e) => {
            if(e.target.value!==""){
                $.ajax({
                    url: `/search/${e.target.value}`,
                    type: 'GET',
                    data: {},
                    dataType: 'html',
                    success: function(data) {
                       $('#books-container').html(data);
                    //    console.log(data);
                    }
                });
            }else{
                $.ajax({
                    url: `/getAllBooks`,
                    type: 'GET',
                    data: {},
                    dataType: 'html',
                    success: function(data) {
                       $('#books-container').html(data);
                    }
                });
            }
        });
    } catch (error) {
        console.log(error);
    }
}

const confirmPassword = () =>{
    try {
        const confirmPassInput = document.getElementById('confirm-password');
        const signUpButton = document.getElementById('signup-button');
        confirmPassInput.addEventListener('keyup', (e) => {
            const password = document.getElementById('password').value;
            if (e.target.value === password) {
                signUpButton.classList.remove('hidden');
            } else {
                if (!signUpButton.classList.contains('hidden')) {
                    signUpButton.classList.add('hidden');
                }
            }
        });
    } catch (error) {
        
    }
}

// const scrollChat = () => {
//     try {
//         const container = document.getElementById('all-chats-container');
//         container.scrollTo({
//             top: container.scrollHeight,
//             behavior: 'smooth' // Opsional, untuk animasi pergerakan
//         });
//     } catch (error) {
        
//     }
// }

tooglePassword();
toogleConfirmPassword();
sideBarToggle();
dropdownToggle();
chatToggle();
cannotBorrow();
canBorrow();
search();
confirmPassword();
// deleteMyBook();
// scrollChat();