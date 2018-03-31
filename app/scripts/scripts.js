// DOM Elements
$body = document.querySelector('body')
signupBtn = document.querySelector('.signupBtn')
signup = document.querySelector('.signup')
signinBtn = document.querySelector('.signinBtn')
signin = document.querySelector('.signin')
closes = document.querySelectorAll('.close')

// Events listeners

// Shows Sign Up popup 
signupBtn.addEventListener('click', () =>
{
  signin.classList.remove('show')
  signup.classList.add('show')
})

// Shows Sign In popup
signinBtn.addEventListener('click', () =>
{
  signup.classList.remove('show')
  signin.classList.add('show')
})

for(let close of closes)
{
  close.addEventListener('click', () =>
  {
    // if(close.classList.contains('signupClose'))
    // {
    //   signup.classList.remove('show')
    // }
    // else if(close.classList.contains('signinClose'))
    // {
    //   signin.classList.remove('show')
    // }

    if(signup.classList.contains('show'))
    {
      signup.classList.remove('show')
    }
    else if(signin.classList.contains('show'))
    {
      signin.classList.remove('show')
    }
  })
}