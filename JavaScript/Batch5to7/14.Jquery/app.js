

// $()

let first_number = $("#firstnumber")
let second_number = $("#secondnumber")
let options = $("#options")
let button = $("#btn")
let h1Result = $("#result")



button.on("click", function () {




    switch (options.val()) {
        case "+":
            h1Result.html(`your Calculation Answer Is : ${Number(first_number.val()) + Number(second_number.val())}`)
            break
        case "-":
            h1Result.html(`your Calculation Answer Is : ${Number(first_number.val()) - Number(second_number.val())}`)

            break
        case "*":
            h1Result.html(`your Calculation Answer Is : ${Number(first_number.val()) * Number(second_number.val())}`)

            break
        default:
    }


})


