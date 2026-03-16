export function formatDateTime(dateString) {
    if (!dateString) return "";

    const date = new Date(dateString);

    const months = [
        "Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.",
        "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."
    ];

    let hours = date.getHours();
    let minutes = date.getMinutes();

    const ampm = hours >= 12 ? "pm" : "am";

    hours = hours % 12;
    hours = hours ? hours : 12;

    hours = hours.toString().padStart(2, "0");
    minutes = minutes.toString().padStart(2, "0");

    const datePart = `${months[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
    const timePart = `${hours}:${minutes} ${ampm}`;

    return `${datePart} <span class="text-muted fs-6">${timePart}</span>`;
}

// ipFormatter.js
export function formatIP(value) {
  if (!value) return '';

  // Remove all non-digit and non-dot characters
  value = value.replace(/[^\d.]/g, '');

  // Remove extra dots
  value = value.replace(/\.{2,}/g, '.');

  // Split into segments
  const segments = value.split('.').slice(0, 4);

  // Limit each segment to 3 digits and max 255
  const formatted = segments.map(seg => {
    let num = seg.slice(0, 3);
    if (num) {
      num = Math.min(parseInt(num, 10), 255);
    }
    return num;
  });

  return formatted.join('.');
}