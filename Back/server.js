import { createServer } from 'http';
import router from './api/routes/router';

const hostname = 'localhost';
const port = 3000;

const server = createServer(router);

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
