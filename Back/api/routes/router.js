// import * from './user.routes';

const router = (req, res) => {
  const url = req.url;
  const method = req.method;
  console.log(url, method);

  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World\n');
}

export default router;
