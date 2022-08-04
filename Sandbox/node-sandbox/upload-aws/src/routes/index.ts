import { Router } from 'express';

import { UploadImagesService } from '../services/UploadImagesService';

import multer from 'multer';
import multerConfig from '../config/multerConfig';

export const routes = Router();
const upload = multer(multerConfig);

routes.post('/', upload.single('file'), async (req, res) => {
  const { file } = req;

  const uploadImagesService = new UploadImagesService();

  if (file) {
    await uploadImagesService.execute(file);
  }

  return res.send();
});

routes.delete('/:filename', async (req, res) => {});
