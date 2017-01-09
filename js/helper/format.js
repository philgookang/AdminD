/**
 *
 *  Covert number to string while adding comma's
 *
 *  params
 *  @num int/float - the number to be converted
 *  @point int - the number of decimal places to preserve
 *
 *  return
 *  @string - string with comma's
 */
var number_format = function( num, point ) {
    if ( point != null ) {
        num = parseFloat(num).toFixed(point);
    }
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
