function decrement() {
  const parentEl = $(this).parent();
  const min = parentEl.find('.inputNumber').attr('min');
  const newValDec = parentEl.find('.inputNumber').val() - 1;
  if(!min || newValDec >= min){
      parentEl.find('.inputNumber').val(newValDec);
  }
}
function increment() {
  const parentEl = $(this).parent();
  const max = parentEl.find('.inputNumber').attr('max');
  const newValInc = parseInt(parentEl.find('.inputNumber').val()) + 1;
  if(!max || newValInc <= max){
      parentEl.find('.inputNumber').val(newValInc);
  }
}
$('.input-number-d').click(decrement);
$('.input-number-i').click(increment);