// tailwind.config.js
module.exports = {
  content: [
    "./*.php", // ค้นหาการใช้งาน Tailwind ในไฟล์ PHP ทั้งหมดในโฟลเดอร์นี้
    "./path/to/your/php/files/**/*.php" // เพิ่มเส้นทางไฟล์ PHP เพิ่มเติมตามต้องการ
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
