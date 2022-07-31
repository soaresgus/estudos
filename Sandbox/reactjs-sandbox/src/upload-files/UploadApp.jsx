import GlobalStyle from './styles/global'
import { Container, Content } from './styles'
import { uniqueId } from 'lodash';
import filesize from 'filesize'

import Upload from './components/Upload'
import { FileList } from './components/FileList'
import { useState } from 'react'

export function UploadApp() {
    const [uploadedFiles, setUploadedFiles] = useState();

    /* const handleUpload = () => {
        const uploadedFiles = files.map(file => ({
            file,
            id: uniqueId(),
            name: file.name,
            readableSize: filesize(file.size),
            preview: URL.createObjectURL(file),
            progress: 0,
            uploaded: false,
            error: false,
            url: null,
        }))
        
        setUploadedFiles({
            uploadedFiles: uploadedFiles.concat(uploadedFiles)
        })
    } */

    return (
        <Container>
            <Content>
                <Upload />
                { true ? (
                    <FileList files={uploadedFiles} />
                ) : ''}
            </Content>
            <GlobalStyle />
        </Container>
    )
}