import GlobalStyle from './styles/global'
import { Container, Content } from './styles'
import { uniqueId } from 'lodash';
import filesize from 'filesize'

import Upload from './components/upload'
import { FileList } from './components/FileList'
import { useState } from 'react'

export function UploadApp() {
    return (
        <Container>
            <Content>
                <Upload />
                <FileList />
            </Content>
            <GlobalStyle />
        </Container>
    )
}