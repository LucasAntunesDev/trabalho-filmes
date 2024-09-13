const toast = document.querySelector('.toast')

if (toast) {
  const close = document.querySelector('#close-toast')
  close.addEventListener('click', () => toast.classList.add('disappear'))
  setTimeout(() => toast.classList.add('disappear'), 2000)
}