require("dotenv").config();
const FtpDeploy = require("ftp-deploy");
const ftpDeploy = new FtpDeploy();

const config = {
  user: process.env.FTP_USER,
  password: process.env.FTP_PASSWORD,
  host: process.env.FTP_HOST,
  port: 21,
  localRoot: __dirname,
  remoteRoot: "/roman/wp-content/themes/roman",

  include: ["**/*"],

  exclude: [
    "**/node_modules/**",
    "**/.git/**",
    "**/*.map",
    "src/**/*.scss",
    "src/**/*.js",
    "webpack.config.js",
    "deploy.js",
    "zip.js",
    "package.json",
    "package-lock.json",
  ],

  deleteRemote: false,
  forcePasv: true,
  sftp: false,
};

console.log('Пуляєм файли на сєрвачок...')

ftpDeploy
    .deploy(config)
    .then((res) => console.log("Вроді як все гуд!"))
    .catch((err) => console.log(err));

ftpDeploy.on("upload-error", function (data) {
    console.log(data.err); // data will also include filename, relativePath, and other goodies
});
