/**
 * Phone Mask — international format with spacing
 * +38 (099) 710-6477
 */
export default function PhoneMask() {
  const telInputs = document.querySelectorAll('input[type="tel"]');

  telInputs.forEach((input) => {
    input.addEventListener('input', handleInput);
    input.addEventListener('focus', handleFocus);
    input.addEventListener('keydown', handleBackspace);
  });
}

function handleFocus(e) {
  const input = e.target;
  if (!input.value) {
    input.value = '+';
  }
}

function handleInput(e) {
  const input = e.target;
  const cursorPos = input.selectionStart;
  const prevLength = input.value.length;

  let digits = input.value.replace(/[^\d]/g, '');

  if (digits.length === 0) {
    input.value = '+';
    return;
  }

  digits = digits.slice(0, 15);
  input.value = formatPhone(digits);

  // Adjust cursor position
  const diff = input.value.length - prevLength;
  input.setSelectionRange(cursorPos + diff, cursorPos + diff);
}

function handleBackspace(e) {
  if (e.key === 'Backspace') {
    const input = e.target;
    const pos = input.selectionStart;

    // Don't delete the "+"
    if (pos <= 1 && input.selectionEnd <= 1) {
      e.preventDefault();
      return;
    }

    // Skip over formatting characters
    const charBefore = input.value[pos - 1];
    if (charBefore === ' ' || charBefore === '(' || charBefore === ')' || charBefore === '-') {
      e.preventDefault();
      const digits = input.value.replace(/[^\d]/g, '').slice(0, -1);
      input.value = digits.length > 0 ? formatPhone(digits) : '+';
    }
  }
}

function formatPhone(digits) {
  // Format: +XX (XXX) XXX-XXXX
  // Country code: first 2 digits, then (3) 3-4
  if (digits.length <= 2) return '+' + digits;
  if (digits.length <= 5) return '+' + digits.slice(0, 2) + ' (' + digits.slice(2);
  if (digits.length <= 8) return '+' + digits.slice(0, 2) + ' (' + digits.slice(2, 5) + ') ' + digits.slice(5);
  return '+' + digits.slice(0, 2) + ' (' + digits.slice(2, 5) + ') ' + digits.slice(5, 8) + '-' + digits.slice(8);
}
