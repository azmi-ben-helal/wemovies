/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import 'bootstrap';

// start the Stimulus application
import './bootstrap';

const routes = require('../public/js/fos_js_routes.json');
import Routing from '../public/bundles/fosjsrouting/js/router.min.js';

Routing.setRoutingData(routes);
/*
$(document).ready(function(){
    $("input[type='radio']").click(function(){
        var radioValue = $("input[name='flexRadioDefault']:checked").val();
        var url = Routing.generate('movie');
        console.log(url);
        if(radioValue){
            $.ajax({
                type: 'GET',
                url: url,
                async : true,
                data: {id : radioValue } ,
                success: function(response, data){
                    console.log(data);
                    console.log(response)
                }
                ,
                error: function(error) {
                    console.log(error);
            }
            });
        }
    });
});
*/
document.querySelectorAll(".form-check").forEach(input =>{
    input.addEventListener("change",(e) => {
        e.preventDefault()
        var radioValue = $("input[name='flexRadioDefault']:checked").val();
        var url = Routing.generate('movie');
        console.log(radioValue);
        if(radioValue){
            $.ajax({
                type: 'GET',
                url: url,
                async : true,
                data: {id : radioValue } ,
                success: function(response, data){
                }
                ,
                error: function(error) {
                    console.log(error);
                }
            });
        }
    })
})