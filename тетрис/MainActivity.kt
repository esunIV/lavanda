package com.example.tetrisgame

import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.view.View
import android.widget.Button
import android.widget.FrameLayout
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity

class MainActivity : AppCompatActivity() {
    private lateinit var tetrisView: TetrisView
    private lateinit var tvScore: TextView
    private lateinit var btnRestart: Button
    private val handler = Handler(Looper.getMainLooper())
    private var gameRunning = true

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val gameContainer = findViewById<FrameLayout>(R.id.game_container)
        tetrisView = TetrisView(this)
        gameContainer.addView(tetrisView)

        tvScore = findViewById(R.id.tvScore)
        btnRestart = findViewById(R.id.btnRestart)

        findViewById<Button>(R.id.btnLeft).setOnClickListener { move { tetrisView.game.moveLeft() } }
        findViewById<Button>(R.id.btnRight).setOnClickListener { move { tetrisView.game.moveRight() } }
        findViewById<Button>(R.id.btnRotate).setOnClickListener { move { tetrisView.game.rotate() } }
        findViewById<Button>(R.id.btnDown).setOnClickListener { move { tetrisView.game.moveDown() } }

        btnRestart.setOnClickListener {
            tetrisView.game.resetGame()
            tetrisView.update()
            tvScore.text = "Score: 0"
            btnRestart.visibility = View.GONE
            gameRunning = true
            startGameLoop()
        }

        startGameLoop()
    }

    private fun move(action: () -> Unit) {
        action()
        tetrisView.update()
        tvScore.text = "Score: ${tetrisView.game.score}"

        if (tetrisView.game.isGameOver) {
            btnRestart.visibility = View.VISIBLE
            gameRunning = false
        }
    }

    private fun startGameLoop() {
        handler.post(object : Runnable {
            override fun run() {
                if (gameRunning) {
                    move { tetrisView.game.moveDown() }
                    handler.postDelayed(this, 500)  // Устанавливаем скорость падения (меньше - быстрее)
                }
            }
        })
    }
    findViewById<Button>(R.id.btnDown).setOnTouchListener { _, event ->
    if (event.action == MotionEvent.ACTION_DOWN) {
        handler.postDelayed(object : Runnable {
            override fun run() {
                if (gameRunning) {
                    move { tetrisView.game.moveDown() }
                    handler.postDelayed(this, 100)  // Ускоряем падение при удержании кнопки
                }
            }
        }, 0)
    }
    false
}
}
