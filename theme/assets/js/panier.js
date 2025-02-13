var total = document.querySelector('#total')
var livraison = document.querySelector('#livraison').value
var price = document.querySelector('#price')

function up(e){

    p = e.parentNode.parentNode

    input = p.querySelector('input')

    max = parseInt(input.dataset.max)
    min = parseInt(input.dataset.min)

    val = parseInt(input.value)

    if(val < max) input.value = val + 1

    reload()

}

function down(e){

    p = e.parentNode.parentNode

    input = p.querySelector('input')

    max = parseInt(input.dataset.max)
    min = parseInt(input.dataset.min)

    val = parseInt(input.value)

    if(val > min) input.value = val - 1

    reload()

}

function maxQtt(e){

    max = parseInt(e.dataset.max)

    val = parseInt(e.value)

    if(val > max) e.value = max

    reload()

}

function reload(){

    mm = 0

    produit = document.querySelectorAll('#produit').forEach(function(e){

        m = e.querySelector('#montant').value
        q = e.querySelector('#quantite').value

        mm = mm + (m * q)

    })

    price.innerHTML = mm
    total.innerHTML = (mm + parseInt(livraison))

}
