import express from 'express';

import multer from 'multer';

import { storage } from './multerConfig';

const app = express();

const upload = multer({ storage });

app.use('/files', express.static('files'));

app.post('/upload', upload.single('file'), (req, res) => {
  return res.json(req.file?.filename);
});

app.listen(process.env.port || '3333', () =>
  console.log('HTTP Server running')
);
