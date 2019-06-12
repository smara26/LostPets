import routes from './';

const findRoute = req => {
  const components = req.url.split('/');
  let params = {};

  const route = routes.filter(r => {
    const rComponents = r.path.split('/');
    if (components.length !== rComponents.length) {
      return false;
    }

    if (req.method !== r.method) {
      return false;
    }

    for (let i = 0; i < rComponents.length; i++) {
      if (rComponents[i].indexOf(':') === 0) {
        rComponents[i] = rComponents[i].substr(1);
        params[rComponents[i]] = components[i];
        continue;
      }

      if (rComponents[i] !== components[i]) {
        params = {};
        return false;
      }
    }

    return true;
  });

  if (route.length > 0) {
    req.params = params;
    return route[0].callback;
  } else {
    return false;
  }
};

const router = (req, res) => {
  const path = req.url;
  const method = req.method;
  console.info('****************************************');
  console.log(method, path);

  const headers = {
    'Access-Control-Allow-Origin': '*',
    'Access-Control-Allow-Methods': 'OPTIONS, POST, GET, PUT, DELETE',
    'Access-Control-Max-Age': 2592000, // 30 days
    /** add other headers as per requirement */
  };
  if (req.method === 'OPTIONS') {
    res.writeHead(204, headers);
    res.end();
    return;
  }

  const callback = findRoute(req);
  res.setHeader('Content-Type', 'application/json');
  if (callback) {
    callback(req, res);
  } else {
    res.statusCode = 404;
    res.write(
      JSON.stringify({
        status: 'error',
        message: 'Path not found!'
      })
    );
    res.end();
  }
}

export default router;
