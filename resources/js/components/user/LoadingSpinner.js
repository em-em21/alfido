const spinner = document.querySelector('.page-spinner-wrapper')

const runSpinner = () => {
	spinner.classList.remove('hidden')
	spinner.classList.add('flex')
}

const stopSpinner = () => {
	spinner.classList.add('hidden')
	spinner.classList.remove('flex')
}

export { runSpinner, stopSpinner }
