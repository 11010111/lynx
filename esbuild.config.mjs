import path from 'path'
import esbuild from 'esbuild'
import * as glob from 'glob'
import * as fsExtra from 'fs-extra'

const watch = process.argv.includes('--watch')
const outDir = 'Resources/Public/JavaScript/Dist'
const inDir = 'Resources/Public/JavaScript/Src'
const extensions = ['js', 'ts']

const entryPoints = setEntryPoints()

function setEntryPoints() {
  let entryPoints = []
  const dir = `${inDir}/**/*.{${extensions.join(',')}}`

  glob.sync(dir).forEach(file => {
    if (path.parse(file).name.startsWith('_') || path.parse(file).base.includes('.d.ts')) {
      return
    }

    const fullOutPath = path.parse(file).dir === inDir ? '' : path.parse(file).dir.replace(inDir + '/', '')

    entryPoints.push({
      out: path.join(fullOutPath, path.parse(file).name),
      in: file
    })
  })

  return entryPoints
}

const notificationPlugin = {
  name: 'notification-plugin',
  setup(build) {
    build.onStart(() => {
      console.log('\x1b[0;92m[esbuild] Compiling...\x1b[0m')
      console.time('\x1b[0;92m[esbuild] Done in')
    })
    build.onEnd(() => {
      console.timeEnd('\x1b[0;92m[esbuild] Done in')
      console.log('\x1b[0m')
    })
  },
}

const options = {
  entryPoints,
  outdir: outDir,
  bundle: true,
  minify: !watch,
  sourcemap: true,
  splitting: true,
  format: 'esm',
  // external: ['../Icons*', '../Font*'],
  plugins: [
    // sassPlugin(),
    notificationPlugin,
  ]
}
const productionOptions = {
  drop: [
    'debugger',
    'console'
  ],
  treeShaking: true
}

fsExtra.emptyDirSync(outDir)

if (watch) {
  const ctx = await esbuild.context(options)
  await ctx.watch()
  console.log('[esbuild] Watching...')
} else {
  await esbuild.build({
    ...options,
    ...productionOptions,
  })
  console.log('[esbuild] Build complete')
}
